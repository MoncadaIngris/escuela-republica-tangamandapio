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

    <h2>Editar alumno</h2>
    <form method="post" action="{{route('alumno.edit',['id'=>$alumno->id])}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label for=" ">Nombre:</label>
            <input type="text" class="form-control" name="nombres" id="nombres" 
            placeholder="Ingrese sus nombres" required value="{{$alumno->nombres}}">
        </div>

        <div class="form-group">
            <label for=" ">Apellido:</label>
            <input type="text" class="form-control" name="apellidos" id="apellidos" 
            placeholder="Ingrese sus apellidos" required value="{{$alumno->apellidos}}">
        </div>

        <div class="form-group">
            <label for=" ">Identidad:</label>
            <input type="number" class="form-control" name="identidad" id="identidad" 
            placeholder="Ingrese su identidad" required maxlength="13" value="{{$alumno->identidad}}"
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        </div>
       
        <div class="form-group">
            <label for=" ">Telefono:</label>
            <input type="number" class="form-control" name="telefono" id="telefono" 
            placeholder="Ingrese su telefono" required maxlength="8" value="{{$alumno->telefono}}"
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        </div>
        
        <div class="form-group">
            <label for=" ">Fecha de Nacimiento:</label>
            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" 
            required value="{{date("Y-m-d", strtotime($alumno->fecha_nacimiento))}}">
        </div>   
        
        <div class="form-group">
            <label for=" ">Seleccione el grado:</label>
            <select name="id_grado" id="id_grado" class="form-control">
                <option value="{{$alumno->id_grado}}" style="display: none">{{$alumno->grado->nombre}}</option>
                @foreach ($grados as $grado)
                    <option value="{{$grado->id}}">{{$grado->nombre}}</option>
                @endforeach
            </select>
        </div>    

        <div class="form-group">
            <label for=" ">Sexo:</label><br>
            @if ($alumno->sexo == 'Femenino')
                <input type="radio" name="sexo" value="Femenino" required checked> Femenino
                <input type="radio" name="sexo" value="Masculino"> Masculino
            @else
                <input type="radio" name="sexo" value="Femenino" required> Femenino
                <input type="radio" name="sexo" value="Masculino" checked> Masculino  
            @endif
        </div> 

        <button type="submit" class="btn btn-primary" >Guardar</button>
        <button type="reset" class="btn btn-danger">borrar</button>
        <a class="btn btn-success" href="/alumno">Volver</a>

    </form>

@endsection