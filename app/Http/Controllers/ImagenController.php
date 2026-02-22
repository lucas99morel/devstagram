<?php

namespace App\Http\Controllers;

use Intervention\Image\Laravel\Facades\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImagenController extends Controller{
    /*
    * Una vez el usuario elija una imagen, se ejecuta este controlador
    * Dropzone envia los datos/propiedades de la imagen con name="file" (a no ser que lo cambie en el js)
    * Se accede a estas propiedades mediante el metodo file() del request
    * 
    * $imgServidor es la imagen que se guardara en local
    * $nombreImg es el nombre unico con el que se guardara la imagen
    * $nombreImg es la cadena que se subira en la base de datos, se genera con Str::uuid()
    * $imgPath es la ruta donde se guardara la imagen, mediante $imgServidor->save($imgPath);
    * 
    * Listo, la imagen elegida por el usuario se puede encontrar en:
    * public/uploads/  
    */
    public function store(Request $request){
        $img = $request->file('file');

        $nombreImg = Str::uuid() . "." . $img->extension();

        $imgServidor = Image::read($img);
        $imgServidor->cover(1000,1000);

        $imgPath = public_path('uploads') . "/$nombreImg";
        $imgServidor->save($imgPath);

        return response()->json([
            'img' => $nombreImg
        ]);
    }
}
