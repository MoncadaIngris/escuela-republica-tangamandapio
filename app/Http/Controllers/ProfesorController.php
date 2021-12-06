<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Models\ProfesorGrado;
use App\Models\Grado;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProfesorRequest;
use App\Http\Requests\UpdateProfesorRequest;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesors = Profesor::paginate(20);

        return view('profesor/indexprofesor')->with('profesors', $profesors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grados = Grado::all();
        return view('profesor/createprofesor')
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
            'identidad' => 'required|unique:profesors,identidad|numeric|max:9999999999999',
            'telefono' => 'required|unique:profesors,telefono|numeric|max:99999999',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'grados' => 'required',
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
            'telefono.numerico' => 'El campo del telefono debe ser numerico',
            'telefono.max' => 'El campo del telefono no es valido',

            'fecha_nacimiento.required' => 'El campo del fecha de nacimiento no puede ser vacio',
            'direccion.required' => 'El campo direccion no puede ser vacio',

            'grados.required' => 'El campo grados no puede ser vacio',
          
        ];

        $this->validate($request,$rules,$mensaje);

        $nuevoProfesor = new Profesor();
        $nuevoProfesor->nombres = $request->input('nombres');
        $nuevoProfesor->apellidos= $request->input('apellidos');
        $nuevoProfesor->sexo = $request->input('sexo');
        $nuevoProfesor->identidad= $request->input('identidad');
        $nuevoProfesor->telefono = $request->input('telefono');
        $nuevoProfesor->fecha_nacimiento= $request->input('fecha_nacimiento');
        $nuevoProfesor->direccion= $request->input('direccion');       
        

        $creado = $nuevoProfesor->save();

        $grados = explode(',', $request->input('grados'));

        foreach($grados as $grado){
            $nuevoGrado = new ProfesorGrado();
            $nuevoGrado->id_grado =  $grado;
            $nuevoGrado->id_profesor =  $nuevoProfesor->id;
            $creado2 = $nuevoGrado->save();
        }

        if ($creado) {
            return redirect()->route('profesor.index')
                ->with('mensaje', 'El profesor fue agregado exitosamente!');
        } else {

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profesor=Profesor::findOrFail($id);
        return view('profesor/showprofesor')->with('profesor', $profesor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grados = Grado::all();
        $profesor=Profesor::findOrFail($id);
        $asignados=ProfesorGrado::where('id_profesor', $id)->get();
        return view('profesor/editprofesor')->with('profesor', $profesor)
        ->with('grados', $grados)->with('asignados', $asignados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfesorRequest  $request
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
            'nombres' => 'required',
            'apellidos' => 'required',
            'sexo' => 'required|in:Femenino,Masculino',
            'identidad' => 'required|numeric|max:9999999999999|unique:profesors,identidad,'.$id,
            'telefono' => 'required|numeric|max:99999999|unique:profesors,telefono,'.$id,
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'grados' => 'required',
        ];

        $mensaje=[
            'nombres.required' => 'El campo del nombre no puede ser vacio',
            'nombre.unique' => 'El campo del nombre ya esta en uso',

            'apeliidos.required' => 'El campo del apellido no puede ser vacio',

            'sexo.required' => 'El campo del sexo no puede ser vacio',
            'sexo.in' => 'El campo del sexo no es valido',

            'identidad.required' => 'El campo de la identidad no puede ser vacio',
            'identidad.unique' => 'El campo de la identidad debe ser único',
            'identidad.numeric' => 'El campo de la identidad debe ser numerico',
            'identidad.max' => 'El campo de la identidad no es valido',

            'telefono.required' => 'El campo del telefono no puede ser vacio',
            'telefono.unique' => 'El campo del telefono debe ser único',
            'telefono.numerico' => 'El campo del telefono debe ser numerico',
            'telefono.max' => 'El campo del telefono no es valido',

            'fecha_nacimiento.required' => 'El campo del fecha de nacimiento no puede ser vacio',
            'direccion.required' => 'El campo direccion no puede ser vacio',

            'grados.required' => 'El campo grados no puede ser vacio',
          
        ];

        $this->validate($request,$rules,$mensaje);

        $nuevoProfesor = Profesor::findOrFail($id);
        $nuevoProfesor->nombres = $request->input('nombres');
        $nuevoProfesor->apellidos= $request->input('apellidos');
        $nuevoProfesor->sexo = $request->input('sexo');
        $nuevoProfesor->identidad= $request->input('identidad');
        $nuevoProfesor->telefono = $request->input('telefono');
        $nuevoProfesor->fecha_nacimiento= $request->input('fecha_nacimiento');
        $nuevoProfesor->direccion= $request->input('direccion');       
        
        $creado = $nuevoProfesor->save();

        $datos = ProfesorGrado::where('id_profesor', $id)->get();

        foreach($datos as $dato){
            ProfesorGrado::destroy($dato->id);
        }

        $grados = explode(',', $request->input('grados'));

        foreach($grados as $grado){
            $nuevoGrado = new ProfesorGrado();
            $nuevoGrado->id_grado =  $grado;
            $nuevoGrado->id_profesor =  $nuevoProfesor->id;
            $creado2 = $nuevoGrado->save();
        }

        if ($creado) {
            return redirect()->route('profesor.index')
                ->with('mensaje', 'El profesor fue editado exitosamente!');
        } else {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Profesor::destroy($id);

        return redirect()->route('profesor.index')->with('mensaje', 'El profesor fue eliminado exitosamente!');;
    }
}
