<?php

namespace App\Http\Controllers\Lk;

use App\Http\Controllers\Controller;
use App\Models\work\UserWork;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\View;

class LkController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $model = UserWork::where('id', $id)->first();
        return view('lk.profile', ['model' => $model]);
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

    }

    public function storeSpecial(Request $request)
    {

    }
}
