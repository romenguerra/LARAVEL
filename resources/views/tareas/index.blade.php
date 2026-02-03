@extends('layout')
@section('title', 'Listado de Tareas')
@section('contenido')

<div class="container pt-4">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Asignatura</th>
                <th scope="col">Fecha_entrega</th>
                <th scope="col">Profesor_id</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($tareas as $tarea)       
                <tr>
                    <th>
                        <a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-primary"><i class="bi bi-search"></i></a>
                        <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{ route('tareas.destroy', $tarea->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </th>
                    <td>{{ $tarea->titulo }}</td>
                    <td>{{ $tarea->descripcion }}</td>
                    <td>{{ $tarea->asignatura }}</td>
                    <td>{{ $tarea->fecha_entrega }}</td>
                    <td>{{ $tarea->profesor_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a class="btn btn-primary" href="{{ route('tareas.create') }}">Nueva Tarea</a>

</div>

@endsection