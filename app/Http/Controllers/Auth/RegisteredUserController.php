<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:60'],
            'surname' => ['required', 'string', 'max:60'],
            'data_birth' => ['required', 'date'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:60', 'unique:'.User ::class],
            'password' => ['required', Rules\Password::defaults()],
            'tel' => ['required', 'string', 'max:20','unique:'.User ::class],          
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'data_birth' => $request->data_birth, 
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tel' => $request->tel,
            'role' => "user",
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
