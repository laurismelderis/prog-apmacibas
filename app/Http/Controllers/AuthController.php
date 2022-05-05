<?php

namespace App\Http\Controllers;

use Illuminate\{
    Support\Facades\Auth,
    Http\Request,
};

class AuthController extends Controller
{
    public function logIn (Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user()->load('group');

            return response()->json($user);
        }

        return response()->json([], 422);
    }

    public function logOut (Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
