<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
            // Return validation exception with error message and old form values
            throw ValidationException::withMessages(['email' => 'The provided credentials do not match our records.']);
            // return back()->with('error', 'The provided credentials do not match our records.');
        }

        // Regenerate session id
        request()->session()->regenerate();
        // Redirect to the home page
        return redirect('/');
    }
    public function destroy()  {
        auth()->logout();
        return redirect('/');
    }
}
