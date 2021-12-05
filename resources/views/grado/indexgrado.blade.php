@extends('plantilla.madre')

@section('contenido')

@if(session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif

    <br>
    <center><h2><strong>Listado de grados</strong></h2></center>
    <a class="btn btn-primary" href="{{route('grado.nuevo')}}">Crear</a>
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
            <th scope="col">Aula</th>
            <th scope="col">Piso</th>
            <th scope="col">Detalles</th>
            <th scope="col">Editar</th>
            <th scope="col">Borrar</th>
        </tr>
        </thead>
        <tbody>
        @forelse($grados as $grado)
            <tr>
                
                <td>{{$grado->nombre}}</td>
                <td>{{$grado->aula}}</td>
                <td>{{$grado->piso}}</td>
                


                <td><a class="btn btn-success" 
                href="{{route('grado.ver',['id'=>$grado->id])}}">Detalles</a></td>


                <td><a class="btn btn-warning" 
                href="{{route('grado.edit',['id'=>$grado->id])}}">Editar</a></td>
                <td>

                    <button onclick="alerta()" class="btn btn-danger">Eliminar</button>

                    <form id="myform" method="post" action="{{route('grado.borrar',['id'=>$grado->id])}}">
                        @csrf
                        @method('delete')

                        <script>
                            function alerta()
                                {
                                var mensaje;
                                var opcion = confirm("Desea eliminar el grado seleccionado");
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
                <th scope="row" colspan="5">no hay grados</th>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$grados->links()}}
@endsection