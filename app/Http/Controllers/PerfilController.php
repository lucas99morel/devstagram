<?php

namespace App\Http\Controllers;

use App\Models\User;

use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PerfilController extends Controller{
    public function index(){
        return view('perfil.index');
    }

    public function store(Request $request){
        $request->validate([
            "username" => ["required", "unique:users,username,". Auth::user()->id, "min:3", "max:30",
                "not_in:" . Controller::$not_in]
        ]);

        if($request->imagen){
            $img = $request->file('imagen');

            $nombreImg = Str::uuid() . "." . $img->extension();

            $imgServidor = Image::read($img);
            $imgServidor->cover(1000,1000);

            $imgPath = public_path('img/perfiles/') . $nombreImg;
            $imgServidor->save($imgPath);
        }
        
        $usuario = User::find(Auth::user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImg ?? Auth::user()->imagen ?? null;
        $usuario->save();

        return redirect()->route('posts.index',$usuario);
        
    }
}
