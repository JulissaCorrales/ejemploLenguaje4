@extends('plantillas.plantilla')

@section('titulo','Titulo de Hija1')
@section('boton','boton1')

@section('contenido')
    <h1>Contenido de la vista Hija 1 y Ejemplo de if</h1>
@isset($nota)
    @if($nota > 60)
        Aprobo con una nota de:  {{$nota}}
    @else
        reprobo con una nota de: {{$nota}}
    @endif
@endisset


    <ol>
        @for($i=1;$i<10;$i++)
            <li>Itmem {{$i}}</li>
        @endfor
    </ol>
@endsection

