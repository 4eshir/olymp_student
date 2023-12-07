<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class EntryListController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.entry-list');
    }

    /*
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
            'role_id' => 2,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }*/
}
