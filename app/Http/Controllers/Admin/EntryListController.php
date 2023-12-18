<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\work\OlympiadEntryWork;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;

class EntryListController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if (!Gate::allows('admin-base')) {
            abort(403);
        }

        $model = OlympiadEntryWork::all();

        $model->temp = json_encode(Http::get(url('/api/get-entries')));

        return view('admin.entry-list.layout', ['model' => $model]);
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
