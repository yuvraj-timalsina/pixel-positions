<?php

namespace App\Http\Controllers;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        dd(request()->all());
    }
}
