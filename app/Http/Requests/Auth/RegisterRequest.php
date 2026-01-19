<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'username' => [
                'required',
                'string',
                'max:50',
                'unique:users,username',
            ],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults(),
            ],
        ];
    }

    public function store(Request $request)
{
    // 1. Validasi Input
    $request->validate([
        'username' => ['required', 'string', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', \Illuminate\Validation\Rules\Password::defaults()],
    ]);

    // 2. Simpan User ke Database
    $user = User::create([
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'role' => 'user', // Set default role sebagai user
    ]);

    return redirect()->route('login')->with('status', 'Registrasi berhasil! Silakan login menggunakan akun baru Anda.');
}

    public function createUser(): User
    {
        return User::create([
            'username' => $this->username,
            'password' => Hash::make($this->password),
        ]);
    }
}