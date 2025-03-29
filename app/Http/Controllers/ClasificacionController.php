<?php

namespace App\Http\Controllers;

use App\Models\Clasificacion;
use App\Models\Institucion;
use Illuminate\Http\Request;

class ClasificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clasificaciones = Clasificacion::all();

        return view('clasificaciones', ['clasificaciones' => $clasificaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clasificacion = new Clasificacion();
        $instituciones = Institucion::orderBy('nombre')->get();
        $footer = '';
        $cntnt = '<form action="'. route('clasificaciones.store').' "method="post">'.
                    view('formClasificacion', ['clasificacion'=>$clasificacion, 'instituciones'=>$instituciones])->render() .'</form>';
        
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
        $data = $this->validateData();dd($data);
        Clasificacion::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clasificacion  $clasificacion
     * @return \Illuminate\Http\Response
     */
    public function show(Clasificacion $clasificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clasificacion  $clasificacion
     * @return \Illuminate\Http\Response
     */
    public function edit($idClasificacion)
    {
        $clasificacion = Clasificacion::find($idClasificacion);
        $instituciones = Institucion::orderBy('nombre')->get();
        $footer = '';
        $cntnt = '<form action="'. route('clasificaciones.update', $clasificacion->id).' "method="post"> <input type="hidden" name="_method" value="PATCH">'.
                    view('formClasificacion', ['clasificacion'=>$clasificacion, 'instituciones'=>$instituciones])->render() .'</form>';
        
        return response()->json([
            'bodyContent' => $cntnt,
            'footer' => $footer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clasificacion  $clasificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idClasificacion)
    {
        $clasificacion = Clasificacion::find($idClasificacion);
        $data = $this->validateData();
        $clasificacion->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clasificacion  $clasificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clasificacion $clasificacion)
    {
        //$clasificacion->delte();

        //return back();
    }

    /** Valida los campos de una Clasificacion. */
    protected function validateData(){
        return request()->validate([
            'nombre' => 'required|string',
            'idInstitucion' => 'required|integer',
        ]);
    }
}
