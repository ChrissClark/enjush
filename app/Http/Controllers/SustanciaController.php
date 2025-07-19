<?php

namespace App\Http\Controllers;

use App\Models\Sustancia;
use Illuminate\Http\Request;

class SustanciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sustancias = Sustancia::all();

        return view('sustancias', ['sustancias' => $sustancias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sustancia = new Sustancia();
        $footer = '';
        $cntnt = '<form action="'. route('sustancias.store').' "method="post">'.
                    view('formSustancia', ['sustancia'=>$sustancia])->render() .'</form>';
        
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
        Sustancia::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sustancia  $sustancia
     * @return \Illuminate\Http\Response
     */
    public function show(Sustancia $sustancia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sustancia  $sustancia
     * @return \Illuminate\Http\Response
     */
    public function edit(Sustancia $sustancia)
    {
        $footer = '';
        $cntnt = '<form action="'. route('sustancias.update', $sustancia->id).' "method="post"> <input type="hidden" name="_method" value="PATCH">'.
                    view('formSustancia', ['sustancia'=>$sustancia])->render() .'</form>';
        
        return response()->json([
            'bodyContent' => $cntnt,
            'footer' => $footer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sustancia  $sustancia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sustancia $sustancia)
    {
        $data = $this->validateData();
        $sustancia->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sustancia  $sustancia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sustancia $sustancia)
    {
        //$sustancia->delte();

        //return back();
    }

    /** Valida los campos de una Sustancia. */
    protected function validateData(){
        return request()->validate([
            'nombre' => 'required|string',
            'nombre' => 'nuallable|string',
        ]);
    }
}
