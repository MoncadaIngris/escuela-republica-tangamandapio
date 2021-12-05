@extends('plantilla.madre')

@section('contenido')

<br>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2>Crear Grado</h2>
    <form method="post" action="">
        @csrf
        <div class="form-group">
            <label for=" ">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" 
            placeholder="Ingrese el nombre del grado" required value="{{old('nombre')}}">
        </div>

        <div class="form-group">
            <label for=" ">aula:</label>
            <input type="number" class="form-control" name="aula" id="aula" 
            placeholder="Ingrese el aula" required value="{{old('aula')}}">
        </div>

        <div class="form-group">
            <label for=" ">Piso:</label>
            <select name="piso" id="piso" class="form-control">
                <option value="">Seleccione el piso</option>
                <option value="Arriba">Arriba</option>
                <option value="Abajo">Abajo</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary" >Guardar</button>
        <button type="reset" class="btn btn-danger">borrar</button>
        <a class="btn btn-success" href="/grado">Volver</a>

    </form>

@endsection