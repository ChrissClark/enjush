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
                    view('formMunicipio', ['municipio'=> $municipio, 'estados'=>$estados])->render() .'</form>';
        
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
        $data = $this->validateData();
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
                    view('formMunicipio', ['municipio'=>$municipio, 'estados'=>$estados])->render() .'</form>';
        
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

    /** Valida los campos de un Municipio. */
    protected function validateData(){
        return request()->validate([
            'nombre' => 'required|string',
            'idEstado' => 'required|integer',
            'cve_mun' => 'nullable|integer',
            'ageb' => 'nullable|string|max:45',
        ]);
    }
}
