<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Models\Estado;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipio = new Municipio();
        $estados = Estado::all();
        $footer = '';
        $cntnt = '<form action="'. route('municipios.store').' "method="post">'.
                    view('ubicacion.formMunicipio', ['municipio'=> $municipio, 'estados'=>$estados])->render() .'</form>';
        
        return response()->json([
            'bodyContent' => $cntnt,
            'footer' => $footer
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['visible' => $request->has('visible') ? 1 : 0]);
        $data = $this->validateData();dd($data);
        Municipio::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function show(Municipio $municipio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipio $municipio)
    {
        $estados = Estado::all();
        $footer = '';
        $cntnt = '<form action="'. route('municipios.update', $municipio->id).' "method="post"> <input type="hidden" name="_method" value="PATCH">'.
                    view('ubicacion.formMunicipio', ['municipio'=>$municipio, 'estados'=>$estados])->render() .'</form>';
        
        return response()->json([
            'bodyContent' => $cntnt,
            'footer' => $footer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Municipio $municipio)
    {
        $request->merge(['visible' => $request->has('visible') ? 1 : 0]);
        $data = $this->validateData();
        $municipio->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipio $municipio)
    {
        $municipio->delete();

        return back();
    }

    /** Valida los campos de un Municipio, en caso de que no sean válidos regresa un mensaje de error. */
    protected function validateData(){
        return request()->validate([
            'nombre' => 'required|string',
            'visible' => 'boolean',
            'idEstado' => 'required|integer',
            'cve_mun' => 'nullable|integer',
            'ageb' => 'nullable|string|max:45',
        ],
        [
            'nombre.required' => 'El nombre del municipio es obligatorio.',
            'idEstado.required' => 'El estado es obligatorio.',
            'idEstado.integer' => 'El estado debe ser un número entero.',
            'cve_mun.integer' => 'La clave del municipio debe ser un número entero.',
            'ageb.max' => 'La AGEB no puede tener más de 45 caracteres.',
        ]);
    }

    /** Regresa una lista de empresas asociadas a un municipio. */
    public function municipoEmpresas($idMunicipio){
        $municipio = Municipio::find($idMunicipio);
        $empresas = [];

        foreach($municipio->empresas as $empresa){
            array_push($empresas, [
                'nombre' => $empresa->nombre,
                'municipio' => $empresa->ubicacion(),
                'sector' => $empresa->subsector->sector->nombre,
                'subsector' => $empresa->subsector->nombre,
                'longitud' => $empresa->longitud,
                'latitud' => $empresa->latitud,
            ]);
        }
        
        return response()->json([
            'empresas' => $empresas,
        ]);
    }
}
