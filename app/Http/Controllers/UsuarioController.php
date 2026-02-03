<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UsuarioController extends Controller
{
    /**
     * Display a listing of usuarios.
     */
    public function index()
    {
        $usuarios = User::paginate(10);
        return view('usuarios.index', ['usuarios' => $usuarios]);
    }

    public function create(Request $request)
    {
        $data = ['exito' =>''];

        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'name'      => 'required|string|max:255',
                'email'     => 'required|email|max:255|unique:users,email',
                'password'  => 'required|string|min:4|confirmed'

            ]);

            $usuario = new User();

            
            $usuario->name      = $request->input('name');;
            $usuario->email       = $request->input('email');;
            $usuario->password    = Hash::make($request->input('password'));;


            $usuario->save();   
            
            $data['exito'] = 'Operación realiza correctamente';

        }

        $usuario = new User();


        return view('usuarios.create',['usuario' => $usuario,'datos' => $data, 'disabled' => '','oper' => 'create']);    
        
    }


    public function show(string $id)
    {

        $datos = ['exito' => ''];
        $usuario = User::find($id);

        return view('usuarios.create',['usuario' => $usuario,'datos' => $datos, 'disabled' => 'disabled','oper' => 'show']);
    }


    public function edit(Request $request,string $id='')
    {
        if ($request->isMethod('post')) {   

            $validated = $request->validate([
                'name'      => 'required|string|max:255',
                'autor'       => 'required|string|max:255',
            
            ]);


            $usuario = User::find($request->input('id'));

            
            $usuario->name      = $request->input('name');;
            $usuario->email       = $request->input('email');;
    

            $usuario->save();   
            
            $datos['exito'] = 'Operación realiza correctamente';
            
            $disabled = 'disabled';
        }
        else
        {
            $datos = ['exito' => ''];
            $usuario = User::find($id);
            $disabled = '';
        }

        return view('usuarios.create',['usuario' => $usuario,'datos' => $datos, 'disabled' => $disabled,'oper' => 'edit']);
    }


    public function destroy(Request $request,string $id='')
    {
       if ($request->isMethod('post')) {   

            $usuario = User::find($request->input('id'));

            
            $usuario->delete();
            
            return redirect()->route('usuarios.index');
            
        }
        else
        {
            $datos = ['exito' => ''];
            $usuario = User::find($id);
            $disabled = 'disabled';

            return view('usuarios.create',['usuario' => $usuario,'datos' => $datos, 'disabled' => $disabled,'oper' => 'destroy']);
        }

        
    }

    /**
     * Store a newly created resource in storage.
     */
    function store(Request $request)
    {
        $usuario = new User();

        $usuario->create(['nombre'=>'Andrés', 'email' => 'andres_calamaro@gmail.com']);
    }

}
