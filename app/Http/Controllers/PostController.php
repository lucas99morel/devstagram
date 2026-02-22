<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\User;
use App\Models\Post;
 
class PostController extends Controller{
    use AuthorizesRequests;

    public function index(User $user){
        $posts = Post::where('user_id',$user->id)->latest()->paginate(20);

        return view('dashboard',[
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'titulo' => ['required','max:128'],
            'descripcion' => ['required'],
            'imagen' => ['required']
        ]);
        $validated["user_id"] = Auth::user()->id;
        
        Post::create($validated);

        return redirect()->route("posts.index",Auth::user()->username);
    }

    public function show(User $user, Post $post){
        return view('posts.show',[
            "user" => $user,
            "post" => $post
        ]);
    }

    public function destroy(Post $post){
        $this->authorize('delete',$post);
        $post->delete();

        $imagenPath = public_path('uploads/' . $post->imagen);
        if (File::exists($imagenPath)){
            unlink($imagenPath);
        }

        return redirect()->route('posts.index',Auth::user()->username);
    }
}
 