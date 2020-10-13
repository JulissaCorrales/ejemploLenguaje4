@extends('plantillas.plantilla')

@section('titulo','Hija2')

@section('contenido')
    <br><br>
    <h1>Ejemplo de Foreach</h1>
    <table border="1">
        <thead>
        <tr><th>Nombre</th></tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $estudiante)
                <tr>
                    <td>{{$estudiante}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br><br>
    <h1>Ejemplo de Forelse</h1>
    <table border="1">
        <thead>
        <tr><th>Nombre</th></tr>
        </thead>
        <tbody>
        @forelse($estudiantes as $estudiante)
            <tr>
                <td>{{$estudiante}}</td>
            </tr>
        @empty
            <tr>
                <td>No hay Estudiantes</td>
            </tr>

        @endforelse
        </tbody>
    </table>
    <h1>Ejemplo de while</h1>
   <ol>
       @while($i < 10)
            <li>item{{$i++}}</li>

       @endwhile

   </ol>




    <h1>Seccion de Contenido</h1>
    <p>En lugares de delicados pastos me hará descansar;
        Junto a aguas de reposo me pastoreará.

        3 Confortará mi alma;
        Me guiará por sendas de justicia por amor de su nombre.

        4 Aunque ande en valle de sombra de muerte,
        No temeré mal alguno, porque tú estarás conmigo;
        Tu vara y tu cayado me infundirán aliento.</p>

       <p> 5 Aderezas mesa delante de mí en presencia de mis angustiadores;
        Unges mi cabeza con aceite; mi copa está rebosando.

        6 Ciertamente el bien y la misericordia me seguirán todos los días de mi vida,
        Y en la casa de Jehová moraré por largos días</p>

@endsection
@section('boton','boton 2')
