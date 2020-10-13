@extends('plantillas.plantilla')

@section('titulo','Formulario de Estudiante')

@section('contenido')
    <h1>Estudiante</h1>

    <!--Para errores mostrar una lista-->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="post" action="{{route('estudiante.update',['id'=>$estudiante->id])}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre"
                   placeholder="Nombre del Estudiante" value="{{$estudiante->nombre}}">
        </div>

        <div class="form-group">
            <label for="apellido">Apelllido</label>
            <input type="text" class="form-control" id="apellido"
                   name="apellido"  placeholder="Apellido del Estudiante" value="{{$estudiante->apellido}}">
        </div>

        <div class="form-group">
            <label for="nota">Nota</label>
            <input type="number" class="form-control" id="nota"
                   name="nota" placeholder="0-100" value="{{$estudiante->nota}}">
        </div>

        <div class="form-group">
            <label for="Identidad">Identidad</label>
            <input type="text" class="form-control" id="identidad"
                   name="identidad" placeholder="0000-0000-00000" value="{{$estudiante->identidad}}">
        </div>
        <div class="form-group">
            <label for="cuenta">cuenta</label>
            <input type="number" class="form-control" id="cuenta"
                   name="cuenta" placeholder="###########" value="{{$estudiante->numero_de_cuenta}}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <input type="reset" class="btn btn-danger">
    </form>

@endsection
