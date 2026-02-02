<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

use App\Models\User;

class UsuarioController extends Controller
{
    /**
     * Display a listing of usuarios.
     */
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', ['usuarios' => $usuarios]);
    }

    function show($id)
    {
        $url = route('usuario.show', ['id' => 5]);
        return "Hola listado 11" . $url;
    }


    /**
     * Store a newly created resource in storage.
     */
    function store(Request $request)
    {
        $usuario = new Usuario();

        $usuario->create(['nombre'=>'Andrés', 'email' => 'andres_calamaro@gmail.com']);
    }

}
