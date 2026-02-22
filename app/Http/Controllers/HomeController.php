<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(){
        $ids = Auth::user()->following->pluck('id')->toArray();
        $posts = Post::whereIn('user_id',$ids)->latest()->paginate(20);
        
        return view('home',[
            'posts' => $posts
        ]);
    }
}
