<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store() {
        // Validate the request
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // Attempt to authenticate the user
        if (!auth()->attempt($attributes)) {
            return back()->with('error', 'The provided credentials do not match our records.');
        }

        // Redirect to the home page
        return redirect('/');
    }
}
