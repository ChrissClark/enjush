<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use Illuminate\Http\Request;

class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituciones = Institucion::all();

        return view('instituciones', ['instituciones' => $instituciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institucion = new Institucion();
        $footer = '';
        $cntnt = '<form action="'. route('instituciones.store').' "method="post">'.
                    view('formInstitucion', ['institucion'=>$institucion])->render() .'</form>';
        
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
        Institucion::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function show(Institucion $institucion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function edit($idInstitucion)
    {
        $institucion = Institucion::find($idInstitucion);
        $footer = '';
        $cntnt = '<form action="'. route('instituciones.update', $institucion->id).' "method="post"> <input type="hidden" name="_method" value="PATCH">'.
                    view('formInstitucion', ['institucion'=>$institucion])->render() .'</form>';
        
        return response()->json([
            'bodyContent' => $cntnt,
            'footer' => $footer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idInstitucion)
    {
        $institucion = Institucion::find($idInstitucion);
        $data = $this->validateData();
        $institucion->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institucion $institucion)
    {
        //$institucion->delte();

        //return back();
    }

    /** Valida los campos de una Sustancia. */
    protected function validateData(){
        return request()->validate([
            'nombre' => 'required|string',
        ]);
    }
}
