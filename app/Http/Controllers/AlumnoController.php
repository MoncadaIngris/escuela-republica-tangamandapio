<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Grado;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::paginate(20);

        return view('alumno/indexalumno')->with('alumnos', $alumnos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grados = Grado::all();
        return view('alumno/createalumno')
        ->with('grados', $grados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlumnoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'nombres' => 'required',
            'apellidos' => 'required',
            'sexo' => 'required|in:Femenino,Masculino',
            'identidad' => 'required|unique:alumnos,identidad|numeric|max:9999999999999',
            'telefono' => 'required|unique:alumnos,telefono|numeric|max:99999999',
            'fecha_nacimiento' => 'required',
            'id_grado' => 'required|exists:grados,id',
        ];

        $mensaje=[
            'nombres.required' => 'El campo del nombre no puede ser vacio',

            'apeliidos.required' => 'El campo del apellido no puede ser vacio',

            'sexo.required' => 'El campo del sexo no puede ser vacio',
            'sexo.in' => 'El campo del sexo no es valido',

            'identidad.required' => 'El campo de la identidad no puede ser vacio',
            'identidad.unique' => 'El campo de la identidad debe ser único',
            'identidad.numeric' => 'El campo de la identidad debe ser numerico',
            'identidad.max' => 'El campo de la identidad no es valido',

            'telefono.required' => 'El campo del telefono no puede ser vacio',
            'telefono.unique' => 'El campo del telefono debe ser único',
            'telefono.numeric' => 'El campo del telefono debe ser numerico',
            'telefono.max' => 'El campo del telefono no es valido',

            'fecha_nacimiento.required' => 'El campo del fecha de nacimiento no puede ser vacio',

            'id_grado.required' => 'El campo grado no puede ser vacio',
            'id_grado.exists' => 'El campo grado no es valido',
          
        ];

        $this->validate($request,$rules,$mensaje);

        $nuevoAlumno = new Alumno();
        $nuevoAlumno->nombres = $request->input('nombres');
        $nuevoAlumno->apellidos= $request->input('apellidos');
        $nuevoAlumno->sexo = $request->input('sexo');
        $nuevoAlumno->identidad= $request->input('identidad');
        $nuevoAlumno->telefono = $request->input('telefono');
        $nuevoAlumno->fecha_nacimiento= $request->input('fecha_nacimiento');
        $nuevoAlumno->id_grado= $request->input('id_grado');
        

            $creado = $nuevoAlumno->save();

        if ($creado) {
            return redirect()->route('alumno.index')
                ->with('mensaje', 'El alumno fue agregado exitosamente!');
        } else {

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grados = Grado::all();
        $alumno=Alumno::findOrFail($id);
        return view('alumno/editalumno')->with('alumno', $alumno)->with('grados', $grados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlumnoRequest  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
            'nombres' => 'required',
            'apellidos' => 'required',
            'sexo' => 'required|in:Femenino,Masculino',
            'identidad' => 'required|numeric|max:9999999999999|unique:alumnos,identidad,'.$id,
            'telefono' => 'required|numeric|max:99999999|unique:alumnos,telefono,'.$id,
            'fecha_nacimiento' => 'required',
            'id_grado' => 'required|exists:grados,id',
        ];

        $mensaje=[
            'nombres.required' => 'El campo del nombre no puede ser vacio',

            'apeliidos.required' => 'El campo del apellido no puede ser vacio',

            'sexo.required' => 'El campo del sexo no puede ser vacio',
            'sexo.in' => 'El campo del sexo no es valido',

            'identidad.required' => 'El campo de la identidad no puede ser vacio',
            'identidad.unique' => 'El campo de la identidad debe ser único',
            'identidad.numeric' => 'El campo de la identidad debe ser numerico',
            'identidad.max' => 'El campo de la identidad no es valido',

            'telefono.required' => 'El campo del telefono no puede ser vacio',
            'telefono.unique' => 'El campo del telefono debe ser único',
            'telefono.numeric' => 'El campo del telefono debe ser numerico',
            'telefono.max' => 'El campo del telefono no es valido',

            'fecha_nacimiento.required' => 'El campo del fecha de nacimiento no puede ser vacio',

            'id_grado.required' => 'El campo grado no puede ser vacio',
            'id_grado.exists' => 'El campo grado no es valido',
          
        ];

        $this->validate($request,$rules,$mensaje);

        $nuevoAlumno = Alumno::findOrFail($id);
        $nuevoAlumno->nombres = $request->input('nombres');
        $nuevoAlumno->apellidos= $request->input('apellidos');
        $nuevoAlumno->sexo = $request->input('sexo');
        $nuevoAlumno->identidad= $request->input('identidad');
        $nuevoAlumno->telefono = $request->input('telefono');
        $nuevoAlumno->fecha_nacimiento= $request->input('fecha_nacimiento');
        $nuevoAlumno->id_grado= $request->input('id_grado');
        

        $creado = $nuevoAlumno->save();

        if ($creado) {
            return redirect()->route('alumno.index')
                ->with('mensaje', 'El alumno fue editado exitosamente!');
        } else {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        //
    }
}
