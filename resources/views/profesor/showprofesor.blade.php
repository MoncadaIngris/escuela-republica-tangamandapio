@extends('plantilla.madre')

@section('contenido')
    <br>
    <h2>Detalles del profesor: </h2>
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
            <td>{{$profesor->nombres}}</td>
        </tr>

        <tr>
            <th scope="col">Apellido:</th>
            <td>{{$profesor->apellidos}}</td>
        </tr>

        <tr>
            <th scope="col">Sexo:</th>
            <td>{{$profesor->sexo}}</td>
        </tr>

        <tr>
            <th scope="col">Identidad:</th>
            <td>{{$profesor->identidad}}</td>
        </tr>

        <tr>
            <th scope="col">Telefono:</th>
            <td>{{$profesor->telefono}}</td>
        </tr>

        <tr>
            <th scope="col">Fecha de nacimiento:</th>
            <td>{{$profesor->fecha_nacimiento}}</td>
        </tr>

        <tr>
            <th scope="col">Direccion:</th>
            <td>{{$profesor->direccion}}</td>
        </tr>

        </tbody>
    </table>

    <a class="btn btn-primary" href="/profesor">Volver</a>

@endsection