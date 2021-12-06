@extends('plantilla.madre')

@section('contenido')

@if(session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif

    <br>
    <center><h2><strong>Listado de profesores</strong></h2></center>

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
            <th scope="col">Direccion</th>
            <th scope="col">Sexo</th>
            <th scope="col">Fecha Nacimiento</th>

        </tr>
        </thead>
        <tbody>
        @forelse($profesors as $profesor)
            <tr>
                
                <td>{{$profesor->profesor->nombres}}</td>
                <td>{{$profesor->profesor->apellidos}}</td>
                <td>{{$profesor->profesor->identidad}}</td>
                <td>{{$profesor->profesor->telefono}}</td>
                <td>{{$profesor->profesor->direccion}}</td>
                <td>{{$profesor->profesor->sexo}}</td>
                <td>{{$profesor->profesor->fecha_nacimiento}}</td>
                
            </tr>
        @empty
            <tr>
                <th scope="row" colspan="5">no hay profesores</th>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$profesors->links()}}
    <a class="btn btn-primary" href="/grado">Volver</a>
@endsection