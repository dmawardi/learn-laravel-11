<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store() {
        // Validate the request
        $attributes = request()->validate([
            'first_name' => ['required', 'min:3', 'max:255'],
            'last_name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:7', 'max:255']
        ]);

        // Create and save the user
        $user = User::create($attributes);

        // Sign the user in
        auth()->login($user);

        // Redirect to the home page
        return redirect('/');
    }
}
