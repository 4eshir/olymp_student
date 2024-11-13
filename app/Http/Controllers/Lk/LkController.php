<?php

namespace App\Http\Controllers\Lk;

use App\Http\Controllers\Controller;
use App\Http\Integrations\EventResource;
use App\Models\common\EducationalInstitution;
use App\Models\common\PhoneConfirm;
use App\Models\temporary\ChildrenEvent;
use App\Models\temporary\Event;
use App\Models\work\EducationalInstitutionWork;
use App\Models\work\MunicipalityWork;
use App\Models\work\UserWork;
use App\Providers\RouteServiceProvider;
use App\services\SmsService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class LkController extends Controller
{

    public function default()
    {
        $id = Auth::id();

        if (!Gate::allows('profile', $id)) {
            abort(403);
        }

        $model = UserWork::where('id', $id)->first();
        $municipalities = MunicipalityWork::all();
        $educational = EducationalInstitutionWork::all();


        return view('lk.profile', ['model' => $model, 'municipalities' => $municipalities, 'educational' => $educational]);
    }

    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        if (!Gate::allows('profile', $id)) {
            abort(403);
        }

        $model = UserWork::where('id', $id)->first();
        $municipalities = MunicipalityWork::all();
        $educational = EducationalInstitutionWork::all();
        return view('lk.profile', ['model' => $model, 'municipalities' => $municipalities, 'educational' => $educational]);
    }

    public function editCommon()
    {
        $id = Auth::id();

        if (!Gate::allows('profile', $id)) {
            abort(403);
        }

        $model = UserWork::where('id', $id)->first();
        return view('lk.profile-edit-common', ['model' => $model]);
    }

    public function requestCommon(Request $request)
    {
        $user = UserWork::where('id', $request->_id)->first();

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->patronymic = $request->patronymic;
        $user->sex = $request->sex;
        $user->birthdate = date("Y-m-d", strtotime($request->birthdate));

        $user->save();

        return redirect()->route('default');
    }

    public function editContact()
    {
        $id = Auth::id();

        if (!Gate::allows('profile', $id)) {
            abort(403);
        }

        $model = UserWork::where('id', $id)->first();
        return view('lk.profile-edit-contact', ['model' => $model]);
    }

    public function requestContact(Request $request)
    {
        $user = UserWork::where('id', $request->_id)->first();

        $user->email = $request->email;
        $user->phone_number = $request->phoneNumber;

        $user->save();

        return redirect()->route('default');
    }

    public function editSpecial()
    {
        $id = Auth::id();

        if (!Gate::allows('profile', $id)) {
            abort(403);
        }

        $model = UserWork::where('id', $id)->first();
        $municipalities = MunicipalityWork::all();
        if ($model->municipality_id !== null)
            $educational = EducationalInstitutionWork::where('municipality_id', $model->municipality_id)->get();
        else
            $educational = EducationalInstitutionWork::all();

        return view('lk.profile-edit-special', ['model' => $model, 'municipalities' => $municipalities, 'educational' => $educational]);
    }

    public function requestSpecial(Request $request)
    {
        $user = UserWork::where('id', $request->_id)->first();

        $user->municipality_id = $request->municipality;
        $user->educational_institution_id = $request->educational;
        $user->class = $request->class;
        $user->address = $request->address;

        $user->save();

        return redirect()->route('default');
    }

    public function phoneConfirm(Request $request)
    {
        $phone = SmsService::convertPhoneNumber($request->_phone);
        $result = SmsService::sendSms($phone);
        Session::put("sms_result:$phone", $result);
        Session::flash('warning', $result);
        return redirect()->route('showPhoneConfirm', ['phone' => $request->_phone, 'result' => $result]);
    }

    public function showPhoneConfirm($phone, $result)
    {
        return view('lk.phone-confirm', ['phone' => $phone, 'refreshTimer' => ($result != 0 && Cache::has("code:{$phone}"))]);
    }

    public function phoneConfirmProcess(Request $request)
    {
        $model = UserWork::where('phone_number', $request->_phone)->first();
        $phone = SmsService::convertPhoneNumber($request->_phone);

        if ($request->has('resend')) {
            Cache::forget("code:{$phone}");
            $phone = SmsService::convertPhoneNumber($request->_phone);
            $result = SmsService::sendSms($phone);
            Session::put("sms_result:$phone", $result);
            Session::flash('warning', $result);
            return redirect()->route('showPhoneConfirm', ['phone' => $request->_phone, 'result' => $result]);
        }
        if (implode('', $request->_code) == Session::get("sms_result:$phone")) {
            $model->phone_verified_at = now();
            $model->save();
            Session::flash('success', 'Вы успешно подтвердили свой профиль');

            return redirect()->route('default');
        }

        Session::flash('danger', 'Неверный код подтверждения');
        return redirect()->route('showPhoneConfirm', ['phone' => $request->_phone, 'result' => 0]);
    }

    public function store(Request $request)
    {
        $user = UserWork::where('id', $request->_id)->first();

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->patronymic = $request->patronymic;
        $user->birthdate = $request->birthdate;
        $user->email = $request->email;
        $user->phone_number = $request->phoneNumber;
        $user->municipality_id = $request->municipality;
        $user->educational_institution_id = $request->educational;
        $user->class = $request->class;
        $user->address = $request->address;

        $user->save();

        return redirect()->route('profile', ['id' => $user->id]);
    }


    public function dropdownEducationalData(Request $request)
    {
        if($request->has('municipality_id')){

            $educational = EducationalInstitutionWork::where('municipality_id', $request->get('municipality_id'))->get();

            return ['success' => true, 'data' => $educational];
        }
    }

}
