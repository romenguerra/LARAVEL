@extends('layout')
@section('title', 'Listado de Usuarios')
@section('contenido')

<div class="container pt-4">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)       
                <tr>
                    <th>
                        <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-primary"><i class="bi bi-search"></i></a>
                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{ route('usuarios.destroy', $usuario->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </th>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a class="btn btn-primary" href="{{ route('usuarios.create') }}">Nuevo Usuario</a>

</div>

@endsection