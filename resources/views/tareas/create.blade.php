@extends('layout')
@section('title', 'Formulario de Tareas')
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



    <form action="/tareas/{{ $oper }}" method="POST">

        @csrf

        <input name="id" type="hidden" value="{{ $tarea->id }}" />
        <div class="mb-3">
            <label for="idtitulo" class="@error('titulo') text-danger @enderror form-label">Titulo</label>
            <input {{ $disabled }} value="{{ old('titulo',$tarea->titulo) }}" type="text" name="titulo" class="@error('titulo') is-invalid @enderror form-control" id="idtitulo" aria-describedby="tareaHelp">
            @error('titulo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div id="tareaHelp" class="form-text">El titulo de la tarea.</div>
        </div>

        <div class="mb-3">
            <label for="iddescripcion" class="@error('descripcion') text-danger @enderror form-label">Descripcion</label>
            <input {{ $disabled }}  value="{{ old('descripcion',$tarea->descripcion) }}" type="text"  name="descripcion" class="@error('descripcion') is-invalid @enderror form-control" id="iddescripcion" aria-describedby="descripcionHelp">
            @error('descripcion')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div id="descripcionHelp" class="form-text">La descripcion de la tarea.</div>
        </div>

        <div class="mb-3">
            <label for="idasignatura" class="@error('asignatura') text-danger @enderror form-label">Asignatura</label>
            <input {{ $disabled }}  value="{{ old('asignatura',$tarea->asignatura) }}" type="text"  name="asignatura" class="@error('asignatura') is-invalid @enderror form-control" id="idasignatura" aria-describedby="asignaturaHelp">
            @error('asignatura')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div id="descripcionHelp" class="form-text">La asignatura de la tarea.</div>
        </div>

        <div class="mb-3">
            <label for="idfecha_entrega" class="@error('fecha_entrega') text-danger @enderror form-label">Fecha entrega</label>
            <input {{ $disabled }}  value="{{ old('fecha_entrega',$tarea->fecha_entrega) }}" type="date"  name="fecha_entrega" class="@error('fecha_entrega') is-invalid @enderror form-control" id="fecha_entrega" aria-describedby="fecha_entregaHelp">
            @error('fecha_entrega')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div id="fecha_entregaHelp" class="form-text">La fecha de entrega de la tarea.</div>
        </div>

        <div class="mb-3">
            <label for="idprofesor_id" class="@error('profesor_id') text-danger @enderror form-label">Profesor id</label>
            <input {{ $disabled }}  value="{{ old('profesor_id',$tarea->profesor_id) }}" type="text"  name="profesor_id" class="@error('profesor_id') is-invalid @enderror form-control" id="profesor_id" aria-describedby="profesor_idHelp">
            @error('profesor_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div id="profesor_idHelp" class="form-text">La fecha de entrega de la tarea.</div>
        </div>        

        @if (!$disabled)
            <button type="submit" class="btn btn-primary">Submit</button>
        @endif

        @if ($oper == 'destroy')
            <button type="submit" class="btn btn-danger">Eliminar tarea</button>
        @endif

    </form>

    <a class="btn btn-info mt-3" href="{{ route('tareas.index') }}">Volver</a>

    
</div>
@endsection