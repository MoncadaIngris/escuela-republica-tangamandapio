@extends('plantilla.madre')

@section('contenido')

@if(session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif

    <br>
    <center><h2><strong>Listado de alumnos</strong></h2></center>
    <a class="btn btn-primary" href="{{route('alumno.nuevo')}}">Crear</a>
    <br><br>
    <!--
    <form action="{{route('alumno.index')}}" method="GET">
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
        @forelse($alumnos as $alumno)
            <tr>
                
                <td>{{$alumno->nombres}}</td>
                <td>{{$alumno->apellidos}}</td>
                <td>{{$alumno->identidad}}</td>
                <td>{{$alumno->telefono}}</td>
                


                <td><a class="btn btn-success" 
                href="{{route('alumno.ver',['id'=>$alumno->id])}}">Detalles</a></td>


                <td><a class="btn btn-warning" 
                href="{{route('alumno.edit',['id'=>$alumno->id])}}">Editar</a></td>
                <td>

                    <form method="post" action="{{route('alumno.borrar',['id'=>$alumno->id])}}">
                        @csrf
                        @method('delete')

                        <button onclick="alerta()" class="btn btn-danger">Eliminar</button>

                        <script>
                            function alerta()
                                {
                                var mensaje;
                                var opcion = confirm("Desea eliminar el alumno seleccionado");
                                if (opcion == true) {
                                    document.submit()
                                } else {
                                
                                }
                            }
                        </script>

                    </form>

                </td>
            </tr>
        @empty
            <tr>
                <th scope="row" colspan="5">no hay alumnos</th>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$alumnos->links()}}
@endsection