<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller{
    public function index(){
        if (!Auth::user()){
            return view('auth.login');
        }

        return redirect()->route('posts.index',Auth::user()->username);
    }

    public function store(Request $request){
        $validated = $request->validate([
            "email" => ["required","email"],
            "password" => ["required"]
        ]);

        if(Auth::attempt($validated,$request->remember)){
            $request->session()->regenerate();

            return redirect()->route('posts.index',Auth::user()->username);
        }

        return back()->withErrors([
            'login-error' => "Credenciales incorrectas"
        ])->onlyInput('email');
    }
}
