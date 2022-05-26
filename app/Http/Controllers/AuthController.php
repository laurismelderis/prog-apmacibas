<?php

namespace App\Http\Controllers;

use Illuminate\{
    Support\Facades\Auth,
    Support\Facades\Hash,
    Http\Request,
};
use App\{
    Models\User,
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

    public function register (Request $request)
    {
        $userData = $request->validate([
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'name' => ['required'],
            'surname' => ['required'],
        ]);

        $user = new User();
        $user->name  = $userData['name'];
        $user->surname = $userData['surname'];
        $user->email = $userData['email'];
        $user->password = Hash::make($userData['password']);
        $user->save();

        return response()->json($user);
    }
}
