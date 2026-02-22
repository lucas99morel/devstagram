<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller{
    public function store(Post $post){
        $post->likes()->create([
            'user_id' => Auth::user()->id
        ]);

        return back();
    }

    public function destroy(Post $post){
        Auth::user()->likes()->where('post_id',$post->id)->delete();

        return back();
    }
}
