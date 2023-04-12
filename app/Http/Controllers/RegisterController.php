<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index() 
    {
        return view('auth.register');
    }
    public function store(Request $request) 
    {
        // dd($request);
        // dd($request->get('username'));

    //Modificar el Request 
    $request->request->add(['username' => Str::slug($request->username)]);

        // Validacion
        $this->validate($request, [
            'name' => 'required|min:1',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
         ]);
        //  dd('Creando usuario');
        // create -->inserInto en laravel
         User::create([
            'name' => $request->name,
            // STR para que lo escriba a minusculas y espacioss -
            // 'username' => Str::slug($request->username),
            'username' => $request->username,
            'email' => $request->email,
            // te lo hashea
            'password' => Hash::make( $request->password )
         ]);

        //  autenticar
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);

        // Otra forma de autenticar
            auth()->attempt($request->only('email', 'password'));


    // Redireccionar el usuario 
    return redirect()->route('posts.index');
    }
}
