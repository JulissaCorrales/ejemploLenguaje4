@extends('plantillas.plantilla')

@section('titulo','Estudiante ')

@section('contenido')

    <h1>Detalles de {{$estudiante->nombre}} {{$estudiante->apellido}}
        <a class="btn btn-warning" href="{{route('estudiante.edit',['id'=>$estudiante->id])}}">Editar</a>
    </h1>


    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Campos</th>
            <th scope="col">Valor</th>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Nombre</th>
                <td>{{$estudiante->nombre}}</td>
            </tr>
        <tr>
            <th scope="row">Apellido</th>
            <td> {{$estudiante->apellido}}</td>
        </tr>
            <tr>
                <th scope="row">Nota</th>
                <td> {{$estudiante->nota}}</td>
            </tr>
            <tr>
                <th scope="row">Fecha de Nacimiento</th>
                <td> {{$estudiante->fecha_nacimiento}}</td>
            </tr>
            <tr>
                <th scope="row">Identidad</th>
                <td> {{$estudiante->identidad}}</td>
            </tr>
            <tr>
                <th scope="row">Numero de Cuenta</th>
                <td> {{$estudiante->numero_de_cuenta}}</td>
            </tr>
        </tbody>
    </table>

   <a clas="btn btn-primary" href="{{route('estudiante.index')}}">Volver</a>  <!--Este es un boton para volver hacia atras -->


@endsection

