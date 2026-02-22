<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SearchController extends Controller{
    public function store(Request $request){
        $validated = $request->validate([
            "username" => ['required']
        ]);

        $username = Str::slug($validated["username"],'_');
        
        if (User::where('username',$username)->get()->count()){
            return redirect()->route('posts.index',$username);
        }

        return back()->withErrors([
            "usuario404" => "Usuario no encontrado!"
        ]);
    }
}
