@extends('plantillas.plantilla')

@section('titulo','Lista de Estudiantes')

@section('contenido')

    @if(session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}
        </div>
    @endif
    <h1>Estudiantes <a class="btn btn-primary" href="{{route('estudiante.crear')}}">
            Nuevo</a></h1>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre Completo</th>
            <th scope="col">Nota</th>
            <th scope="col">Cuenta</th>
            <th scope="col">Ver</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>

        </tr>
        </thead>
        <tbody>
        @forelse($estudiantes as $estudiante)
            <tr>
                <th scope="row">{{$estudiante->id}}</th>
                <td>{{$estudiante->nombre}}  {{$estudiante->apellido}}</td>
                <td>{{$estudiante->nota}}</td>
                <td>{{$estudiante->numero_de_cuenta}}</td>
                <td> <a class="btn btn-info " href="{{route('estudiante.mostrar',['id'=>$estudiante->id])}}">Ver</a></td>
                <td> <a class="btn btn-warning " href="{{route('estudiante.edit',['id'=>$estudiante->id])}}">Editar</a></td>
                <!--para borrar:-->
                <td>
                    <!--con  ventana modal  -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-{{$estudiante->id}}">
                        Eliminar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modal-{{$estudiante->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Estudiante</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ¿Desea realmente eliminar el estudiante {{$estudiante->nombre}}?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <form method="post" action="{{route('estudiante.borrar',['id'=>$estudiante->id])}}">

                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Eliminar" class="btn btn-danger">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>





                    <!--antes normal sin modal
                    <form method="post" action="{{route('estudiante.borrar',['id'=>$estudiante->id])}}">

                        @csrf
                        @method('delete')
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>
                       -->

                </td>

            </tr>
            @empty
            <tr>
                <td colspan="4">No hay estudiante</td>
            </tr>
        @endforelse


        </tbody>
    </table>
    {{$estudiantes->links()}}<!--crea enlace para poder ver los enlaces de las paginas como van de 10 en 10 necesitamos ver los demas-->



@endsection
