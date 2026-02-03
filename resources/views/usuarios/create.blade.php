@extends('layout')
@section('title', 'Formulario de Usuarios')
@section('contenido')

<div class="container pt-4">
    <ul>
    @foreach ($errors->all() as $error)
        <li  class="text-danger">{{ $error }}</li>
    @endforeach
    </ul>

    @if($datos['exito'])

        <p class="alert alert-success"> {{ $datos['exito'] }} </p>

    @endif



    <form action="/usuarios/{{ $oper }}" method="POST">

        @csrf

        <input name="id" type="hidden" value="{{ $usuario->id }}" />
        <div class="mb-3">
            <label for="idname" class="@error('name') text-danger @enderror form-label">Nombre</label>
            <input {{ $disabled }} value="{{ old('name',$usuario->name) }}" type="text" name="name" class="@error('name') is-invalid @enderror form-control" id="idname" aria-describedby="usuarioHelp">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div id="usuarioHelp" class="form-text">El nombre del usuario.</div>
        </div>

        <div class="mb-3">
            <label for="idemail" class="@error('email') text-danger @enderror form-label">Email</label>
            <input {{ $disabled }}  value="{{ old('email',$usuario->email) }}" type="email"  name="email" class="@error('email') is-invalid @enderror form-control" id="idemail" aria-describedby="emailHelp">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div id="emailHelp" class="form-text">El email del usuario.</div>
        </div>

        <div class="mb-3">
            <label for="idpassword" class="@error('password') text-danger @enderror form-label">Contraseña</label>
            <input {{ $disabled }}  value="{{ old('password',$usuario->password) }}" type="password"  name="password" class="@error('password') is-invalid @enderror form-control" id="idpassword" aria-describedby="passwordHelp">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div id="emailHelp" class="form-text">La contraseña del usuario.</div>
        </div>

        @if ($oper == 'create')
            <div class="mb-3">
                <label for="idpassword_confirmation" class="form-label">Confirmar Contraseña</label>
                <input {{ $disabled }} type="password" name="password_confirmation" class="form-control" id="idpassword_confirmation">
            </div>
        @endif
        

        @if (!$disabled)
            <button type="submit" class="btn btn-primary">Submit</button>
        @endif

        @if ($oper == 'destroy')
            <button type="submit" class="btn btn-danger">Eliminar usuario</button>
        @endif

    </form>

    <a class="btn btn-info mt-3" href="{{ route('usuarios.index') }}">Volver</a>

    
</div>
@endsection