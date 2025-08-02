<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $captcha = rand(10000, 99999);
        Session::put('captcha_register', $captcha);

        return view('auth.register', ['captcha' => $captcha]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'telepon' => 'required|string|max:20|unique:users,telepon',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'captcha' => ['required', 'digits:5', function ($attribute, $value, $fail) {
                if ($value != session('captcha_register')) {
                    $fail('Captcha tidak sesuai.');
                }
            }],
        ]);

        // Hapus captcha setelah dipakai
        Session::forget('captcha_register');

        $user = User::create([
            'name' => $request->name,
            'telepon' => $request->telepon,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('user.instance');
    }
}
