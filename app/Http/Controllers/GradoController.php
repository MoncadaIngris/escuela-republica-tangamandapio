<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Profesor;
use App\Models\ProfesorGrado;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGradoRequest;
use App\Http\Requests\UpdateGradoRequest;

class GradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grados = Grado::paginate(20);

        return view('grado/indexgrado')->with('grados', $grados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profesors = Profesor::all();
        return view('grado/creategrado')
        ->with('profesors', $profesors);
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
            'nombre' => 'required|unique:grados,nombre',
            'aula' => 'required|numeric|unique:grados,aula',
            'piso' => 'required|in:Arriba,Abajo',
            'profesors' => 'required',
        ];

        $mensaje=[
            'nombre.required' => 'El campo del nombre no puede ser vacio',
            'nombre.unique' => 'El campo del nombre ya esta en uso',

            'aula.required' => 'El campo de aula no puede ser vacio',
            'aula.numeric' => 'El campo de aula debe de ser numerico',
            'aula.unique' => 'El campo de aula ya esta en uso',

            'piso.required' => 'El campo del piso no puede ser vacio',
            'piso.in' => 'El campo del piso no es valido',
          
            'profesors.required' => 'El campo profesor no puede ser vacio',
        ];

        $this->validate($request,$rules,$mensaje);

        $nuevoGrado = new Grado();
        $nuevoGrado->nombre = $request->input('nombre');
        $nuevoGrado->aula= $request->input('aula');
        $nuevoGrado->piso = $request->input('piso');  
        

        $creado = $nuevoGrado->save();

        $profesors = explode(',', $request->input('profesors'));

        foreach($profesors as $profesor){
            $nuevoProfesor = new ProfesorGrado();
            $nuevoProfesor->id_grado =  $nuevoGrado->id;
            $nuevoProfesor->id_profesor =  $profesor;
            $creado2 = $nuevoProfesor->save();
        }

        if ($creado) {
            return redirect()->route('grado.index')
                ->with('mensaje', 'El grado fue agregado exitosamente!');
        } else {

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grado = Grado::findOrFail($id);
        return view('grado/showgrado')->with('grado', $grado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profesors = Profesor::all();
        $grado = Grado::findOrFail($id);
        $asignados=ProfesorGrado::where('id_grado', $id)->get();
        return view('grado/editgrado')->with('grado', $grado)
        ->with('profesors', $profesors)->with('asignados', $asignados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGradoRequest  $request
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
            'nombre' => 'required|unique:grados,nombre,'.$id,
            'aula' => 'required|numeric|unique:grados,aula,'.$id,
            'piso' => 'required|in:Arriba,Abajo',
            'profesors' => 'required',
        ];

        $mensaje=[
            'nombre.required' => 'El campo del nombre no puede ser vacio',
            'nombre.unique' => 'El campo del nombre ya esta en uso',

            'aula.required' => 'El campo de aula no puede ser vacio',
            'aula.numeric' => 'El campo de aula debe de ser numerico',
            'aula.unique' => 'El campo de aula ya esta en uso',

            'piso.required' => 'El campo del piso no puede ser vacio',
            'piso.in' => 'El campo del piso no es valido',

            'profesors.required' => 'El campo profesor no puede ser vacio',
          
        ];

        $this->validate($request,$rules,$mensaje);

        $nuevoGrado = Grado::findOrFail($id);
        $nuevoGrado->nombre = $request->input('nombre');
        $nuevoGrado->aula= $request->input('aula');
        $nuevoGrado->piso = $request->input('piso');  
        

            $creado = $nuevoGrado->save();

            $datos = ProfesorGrado::where('id_grado', $id)->get();

            foreach($datos as $dato){
                ProfesorGrado::destroy($dato->id);
            }

            $profesors = explode(',', $request->input('profesors'));

            foreach($profesors as $profesor){
                $nuevoProfesor = new ProfesorGrado();
                $nuevoProfesor->id_grado =  $nuevoGrado->id;
                $nuevoProfesor->id_profesor =  $profesor;
                $creado2 = $nuevoProfesor->save();
            }

        if ($creado) {
            return redirect()->route('grado.index')
                ->with('mensaje', 'El grado fue editado exitosamente!');
        } else {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Grado::destroy($id);

        return redirect()->route('grado.index')->with('mensaje', 'El grado fue eliminado exitosamente!');;
    }
}
