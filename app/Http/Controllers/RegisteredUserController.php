<?php

namespace App\Http\Controllers;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        request()?->validate([
            'first_name' => ['required'],
            'last_name' => ['nullable'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required'],
        ]);
    }
}
