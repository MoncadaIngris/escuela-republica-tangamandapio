@extends('plantilla.madre')

@section('contenido')

@if(session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif

    <br>
    <center><h2><strong>Listado de grados</strong></h2></center>

    <br><br>

    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Aula</th>
            <th scope="col">Piso</th>
        </tr>
        </thead>
        <tbody>
        @forelse($grados as $grado)
            <tr>
                
                <td>{{$grado->grado->nombre}}</td>
                <td>{{$grado->grado->aula}}</td>
                <td>{{$grado->grado->piso}}</td>
                
            </tr>
        @empty
            <tr>
                <th scope="row" colspan="5">no hay grados</th>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$grados->links()}}

    <a class="btn btn-primary" href="/profesor">Volver</a>
@endsection