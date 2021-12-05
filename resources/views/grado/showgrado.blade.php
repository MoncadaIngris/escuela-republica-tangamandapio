@extends('plantilla.madre')

@section('contenido')
    <br>
    <h2>Detalles del grado: </h2>
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
            <td>{{$grado->nombre}}</td>
        </tr>

        <tr>
            <th scope="col">Aula:</th>
            <td>{{$grado->aula}}</td>
        </tr>

        <tr>
            <th scope="col">Piso:</th>
            <td>{{$grado->piso}}</td>
        </tr>

        </tbody>
    </table>

    <a class="btn btn-primary" href="/grado">Volver</a>

@endsection