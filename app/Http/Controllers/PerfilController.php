<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    // esta funcion sirve para que solo tengan accesor usuario autenticados
    {
        $this->middleware(('auth'));
    }   
    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);     
        $this->validate($request, [
            'username'=> ['required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:20', 'not_in:twitteer, editar-perfil'],
        ]);

        if($request->imagen) 
        {

            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid().".".$imagen->extension();
            
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000, 1000);
            
            $imagenPath = public_path('uploads') .'/'. $nombreImagen;
            // print($imagenPath);
            $imagenServidor->save($imagenPath);
            // return response()->json(['imagen' => $nombreImagen ]);
            // return response()->json($imagenPath);
    

        } 
        // Guardar cambios
        $usuario =  User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();

        // redireccionar usuario
        return redirect()->route('posts.index', $usuario->username);
    }
}
