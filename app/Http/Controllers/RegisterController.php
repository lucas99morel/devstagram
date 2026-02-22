<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class RegisterController extends Controller{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        $request->merge(['username' => Str::slug($request->username,'_')]);
 
        $validated = $request->validate([
            "name" => ["required", "max:20"],
            "username" => ["required", "unique:users", "min:3", "max:30",
                "not_in:" . Controller::$not_in],
            "email" => ["required", "unique:users", "email", "max:30"],
            "password" => ["required","confirmed","min:5"]
        ]);
        $validated['password'] = Hash::make($validated['password']);
        
        $user = User::create($validated);
        
        Auth::login($user);
        
        return redirect()->route('posts.index',Auth::user());
    }
}
