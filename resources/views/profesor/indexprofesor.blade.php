@extends('plantilla.madre')

@section('contenido')

@if(session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif

    <br>
    <center><h2><strong>Listado de profesores</strong></h2></center>
    <a class="btn btn-primary" href="{{route('profesor.nuevo')}}">Crear</a>
    <br><br>
    <!--
    <form action="{{route('profesor.index')}}" method="GET">
        <div>
            <input type="text" class="form-control" name="busqueda"
                placeholder="Busqueda" value="{}">

                <button type="submit" class="btn btn-primary">
                    Buscar
                </button>
    
                <a type="button" href='cliente' class="btn btn-danger">
                Limpiar
                </a>
        </div>
    </form>
-->
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Identidad</th>
            <th scope="col">Telefono</th>
            <th scope="col">Detalles</th>
            <th scope="col">Editar</th>
            <th scope="col">Borrar</th>
        </tr>
        </thead>
        <tbody>
        @forelse($profesors as $profesor)
            <tr>
                
                <td>{{$profesor->nombres}}</td>
                <td>{{$profesor->apellidos}}</td>
                <td>{{$profesor->identidad}}</td>
                <td>{{$profesor->telefono}}</td>
                


                <td><a class="btn btn-success" 
                href="{{route('profesor.ver',['id'=>$profesor->id])}}">Detalles</a></td>


                <td><a class="btn btn-warning" 
                href="{{route('profesor.edit',['id'=>$profesor->id])}}">Editar</a></td>
                <td>

                    <button onclick="alerta()" class="btn btn-danger">Eliminar</button>

                    <form id="myform" method="post" action="{{route('profesor.borrar',['id'=>$profesor->id])}}">
                        @csrf
                        @method('delete')

                        <script>
                            function alerta()
                                {
                                var mensaje;
                                var opcion = confirm("Desea eliminar el profesor seleccionado");
                                if (opcion == true) {
                                    document.forms["myform"].submit();
                                } else {
                                
                                }
                            }
                        </script>

                    </form>

                </td>
            </tr>
        @empty
            <tr>
                <th scope="row" colspan="5">no hay profesores</th>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$profesors->links()}}
@endsection