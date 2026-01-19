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
use App\Http\Requests\Auth\RegisterRequest;

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

    $validated = $request->validate([
        'username' => 'required|string|max:255|unique:users,username',
        'email'    => 'required|email|unique:users,email',
        'no_telp'  => 'required|string|max:20',
        'password' => 'required|confirmed|min:8',
    ]);

    $user = User::create([
        'username' => $validated['username'],
        'email' => $validated['email'],
        'no_telp' => $validated['no_telp'],
        'password' => Hash::make($validated['password']),
    ]);

    return redirect()->route('login')->with('status', 'Registrasi berhasil! Silakan login menggunakan akun baru Anda.');
}
}
