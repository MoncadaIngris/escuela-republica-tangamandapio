@extends('plantilla.madre')

@section('contenido')
    <br>
    <h2>Detalles del alumno: </h2>
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">Campo</th>
            <th scope="col">Valor</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <th scope="col">Nombre:</th>
            <td>{{$alumno->nombres}}</td>
        </tr>

        <tr>
            <th scope="col">Apellido:</th>
            <td>{{$alumno->apellidos}}</td>
        </tr>

        <tr>
            <th scope="col">Sexo:</th>
            <td>{{$alumno->sexo}}</td>
        </tr>

        <tr>
            <th scope="col">Identidad:</th>
            <td>{{$alumno->identidad}}</td>
        </tr>

        <tr>
            <th scope="col">Telefono:</th>
            <td>{{$alumno->telefono}}</td>
        </tr>

        <tr>
            <th scope="col">Fecha de nacimiento:</th>
            <td>{{$alumno->fecha_nacimiento}}</td>
        </tr>

        <tr>
            <th scope="col">Grado:</th>
            <td>{{$alumno->grado->nombre}}</td>
        </tr>

        </tbody>
    </table>

    <a class="btn btn-primary" href="/alumno">Volver</a>

@endsection