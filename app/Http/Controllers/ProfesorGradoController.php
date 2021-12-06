<?php

namespace App\Http\Controllers;

use App\Models\ProfesorGrado;
use App\Http\Requests\StoreProfesorGradoRequest;
use App\Http\Requests\UpdateProfesorGradoRequest;

class ProfesorGradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profesor($id)
    {
        $profesors = ProfesorGrado::where('id_grado', $id)->paginate(20);

        return view('grado/profesor')->with('profesors', $profesors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function grado($id)
    {
        $grados = ProfesorGrado::where('id_profesor', $id)->paginate(20);

        return view('profesor/grado')->with('grados', $grados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfesorGradoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfesorGradoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfesorGrado  $profesorGrado
     * @return \Illuminate\Http\Response
     */
    public function show(ProfesorGrado $profesorGrado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfesorGrado  $profesorGrado
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfesorGrado $profesorGrado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfesorGradoRequest  $request
     * @param  \App\Models\ProfesorGrado  $profesorGrado
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfesorGradoRequest $request, ProfesorGrado $profesorGrado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfesorGrado  $profesorGrado
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfesorGrado $profesorGrado)
    {
        //
    }
}
