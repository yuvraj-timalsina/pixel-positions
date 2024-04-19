<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {

        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()?->validate([
            'first_name' => ['required'],
            'last_name' => ['nullable'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::default(), 'confirmed'],
        ]);
        $user = User::create($attributes);
        Auth::login($user);

        return to_route('jobs.index');
    }
}
