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

    <h2>Crear Profesor</h2>
    <form method="post" action="">
        @csrf
        <div class="form-group">
            <label for=" ">Nombre:</label>
            <input type="text" class="form-control" name="nombres" id="nombres" maxlength="100"
            placeholder="Ingrese sus nombres" required value="{{old('nombres')}}">
        </div>

        <div class="form-group">
            <label for=" ">Apellido:</label>
            <input type="text" class="form-control" name="apellidos" id="apellidos" maxlength="100"
            placeholder="Ingrese sus apellidos" required value="{{old('apellidos')}}">
        </div>

        <div class="form-group">
            <label for=" ">Identidad:</label>
            <input type="number" class="form-control" name="identidad" id="identidad" 
            placeholder="Ingrese su identidad" required maxlength="13" value="{{old('identidad')}}"
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        </div>
       
        <div class="form-group">
            <label for=" ">Telefono:</label>
            <input type="number" class="form-control" name="telefono" id="telefono" 
            placeholder="Ingrese su telefono" required maxlength="8" value="{{old('telefono')}}"
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        </div>

        <div class="form-group">
            <label for=" ">Fecha de Nacimiento:</label>
            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" 
            required value="{{old('fecha_nacimiento')}}">
        </div>   
        
        <div class="form-group">
            <label for=" ">Direccion:</label>
            <input type="text" class="form-control" name="direccion" id="direccion" maxlength="100"
            required value="{{old('direccion')}}" placeholder="Ingrese la direccion">
        </div> 

        
        <div class="form-group">
            <label for=" ">Asignar Grado:</label>
            <select class="selectpicker form-control" multiple name="grado" id="grado" onchange="datos()">
                @foreach ($grados as $grado)
                        <option value="{{$grado->id}}" checked>{{$grado->nombre}}</option>
                @endforeach
            </select>
            <div class="form-group" style="display: none;">
                <input type="text" id="grados" name="grados" class="form-control form-control-user">
            </div>
        </div>      

        <script>
            $('select').selectpicker();

            function datos() {
                var select = $('#grado').val();

                document.getElementById('grados').value = select;

            }
        </script>

        <div class="form-group">
            <label for=" ">Sexo:</label><br>
            <input type="radio" name="sexo" value="Femenino" required> Femenino
            <input type="radio" name="sexo" value="Masculino"> Masculino
        </div> 

        <button type="submit" class="btn btn-primary" >Guardar</button>
        <button type="reset" class="btn btn-danger">borrar</button>
        <a class="btn btn-success" href="/profesor">Volver</a>

    </form>

@endsection