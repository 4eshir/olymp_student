<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\work\UserWork;
use App\Providers\RouteServiceProvider;
use App\Rules\TrueCheckboxValue;
use App\Validation\Rules\PasswordCustom;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $messages = [
            'accepted' => 'Вы должны согласиться с политикой обработки данных',
        ];

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'password' => ['required', 'confirmed', PasswordCustom::defaults()],
            'phone_number' => ['required', 'unique:user'],
        ]);

        $request->validate([
            'pdPolicy' => 'accepted',
        ], $messages);


        $request->phone_number = str_replace(["(", ")", "+", "-", " "], "", $request->phone_number);
        $request->phone_number = substr_replace($request->phone_number, '8', 0, 1);

        $user = UserWork::create([
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
