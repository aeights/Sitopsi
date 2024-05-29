<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        // $validated = $request->validate([
        //     'email' => 'email|required|exists:users,email',
        //     'password' => 'required|min:6'
        // ]);

        $credentials = [
            filter_var($request->input('identifier'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username' => $request->input('identifier'),
            'password' => $request->input('password'),
        ];

        if ($credentials) {
            $attempt = Auth::attempt($credentials);
            if ($attempt) {
                return to_route('redirect')->with('message','Login berhasil');
            }
            return back()->with('message','Email atau password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login.index')->with('message','Logout berhasil');
    }
}
