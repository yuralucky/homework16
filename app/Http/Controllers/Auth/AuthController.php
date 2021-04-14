<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function handleLogin(Request $request)
    {
        $data = $request->validate([
            'email' => ['required'],
            'password' => ['required', 'min:3']
        ]);
        if (!Auth::attempt($data)) {
            $user = new User();
            $user->name = $data['email'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->save();
            Auth::login($user);
        }
        return redirect()->route('advertisements.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('advertisements.index');
    }
}
