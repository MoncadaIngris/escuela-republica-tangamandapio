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
            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100"
            placeholder="Ingrese el nombre del grado" required value="{{old('nombre')}}">
        </div>

        <div class="form-group">
            <label for=" ">aula:</label>
            <input type="number" class="form-control" name="aula" id="aula" maxlength="3"
            placeholder="Ingrese el aula" required value="{{old('aula')}}"
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        </div>

        <div class="form-group">
            <label for=" ">Piso:</label>
            <select name="piso" id="piso" class="form-control">
                <option value="" style="display: none">Seleccione el piso</option>
                <option value="Arriba">Arriba</option>
                <option value="Abajo">Abajo</option>
            </select>
        </div>

        <div class="form-group">
            <label for=" ">Asignar Profesor:</label>
            <select class="selectpicker form-control" multiple name="profesor" id="profesor" onchange="datos()">
                @foreach ($profesors as $profesor)
                        <option value="{{$profesor->id}}" checked>{{$profesor->nombres}} {{$profesor->apellidos}}</option>
                @endforeach
            </select>
            <div class="form-group" style="display: none;">
                <input type="text" id="profesors" name="profesors" class="form-control form-control-user">
            </div>
        </div>      

        <script>
            $('select').selectpicker();

            function datos() {
                var select = $('#profesor').val();

                document.getElementById('profesors').value = select;

            }
        </script>
        
        <button type="submit" class="btn btn-primary" >Guardar</button>
        <button type="reset" class="btn btn-danger">borrar</button>
        <a class="btn btn-success" href="/grado">Volver</a>

    </form>

@endsection