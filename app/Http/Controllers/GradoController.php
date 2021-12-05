<?php

namespace App\Http\Controllers;

use App\Models\Grado;
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
        return view('grado/creategrado');
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
            'nombre' => 'required',
            'aula' => 'required|numeric',
            'piso' => 'required|in:Arriba,Abajo',
        ];

        $mensaje=[
            'nombre.required' => 'El campo del nombre no puede ser vacio',

            'aula.required' => 'El campo de aula no puede ser vacio',
            'aula.numeric' => 'El campo de aula debe de ser numerico',

            'piso.required' => 'El campo del piso no puede ser vacio',
            'piso.in' => 'El campo del piso no es valido',
          
        ];

        $this->validate($request,$rules,$mensaje);

        $nuevoGrado = new Grado();
        $nuevoGrado->nombre = $request->input('nombre');
        $nuevoGrado->aula= $request->input('aula');
        $nuevoGrado->piso = $request->input('piso');  
        

            $creado = $nuevoGrado->save();

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
        $grado = Grado::findOrFail($id);
        return view('grado/editgrado')->with('grado', $grado);
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
            'nombre' => 'required',
            'aula' => 'required|numeric',
            'piso' => 'required|in:Arriba,Abajo',
        ];

        $mensaje=[
            'nombre.required' => 'El campo del nombre no puede ser vacio',

            'aula.required' => 'El campo de aula no puede ser vacio',
            'aula.numeric' => 'El campo de aula debe de ser numerico',

            'piso.required' => 'El campo del piso no puede ser vacio',
            'piso.in' => 'El campo del piso no es valido',
          
        ];

        $this->validate($request,$rules,$mensaje);

        $nuevoGrado = Grado::findOrFail($id);
        $nuevoGrado->nombre = $request->input('nombre');
        $nuevoGrado->aula= $request->input('aula');
        $nuevoGrado->piso = $request->input('piso');  
        

            $creado = $nuevoGrado->save();

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
