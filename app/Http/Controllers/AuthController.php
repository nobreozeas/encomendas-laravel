<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if(Auth::check() === true){
            return redirect()->route('dashboard.home');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('usuario', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.home');
        }

        return redirect()->route('login')->with('error', 'Usuário ou senha inválidos');
    }
}
