<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Comentario;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ComentarioController extends Controller{
    public function store(Request $request, User $user, Post $post){
        $request->validate([
            'comentario' => ['required','max:256']
        ]);
        
        Comentario::create([
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario
        ]);
        
        return back()->with('success',"Comentario Realizado correctamente!");
    }
}
