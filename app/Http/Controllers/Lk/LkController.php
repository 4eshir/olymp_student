<?php

namespace App\Http\Controllers\Lk;

use App\Http\Controllers\Controller;
use App\Http\Integrations\EventResource;
use App\Models\common\EducationalInstitution;
use App\Models\work\EducationalInstitutionWork;
use App\Models\work\MunicipalityWork;
use App\Models\work\UserWork;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $try = EventResource::list();

        return view('lk.profile', ['model' => $model, 'municipalities' => $municipalities, 'educational' => $educational, 'try' => $try]);
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


    public function storeBase(Request $request)
    {
        $user = UserWork::where('id', $request->_id)->first();

        $user->name = $request->name;
        $user->birthdate = $request->birthdate;

        $user->save();

        return redirect()->route('profile', ['id' => $user->id]);
    }

    public function storeContact(Request $request)
    {
        $user = UserWork::where('id', $request->_id)->first();

        $user->email = $request->email;
        $user->phone_number = $request->phoneNumber;

        $user->save();

        return redirect()->route('profile', ['id' => $user->id]);
    }

    public function storeSpecial(Request $request)
    {
        $user = UserWork::where('id', $request->_id)->first();

        $user->municipality_id = $request->municipality;
        $user->educational_institution_id = $request->educational;
        $user->class = $request->class;
        $user->address = $request->address;

        $user->save();

        return redirect()->route('profile', ['id' => $user->id]);
    }
}
