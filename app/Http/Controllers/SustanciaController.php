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
        //$sustancias = Sustancia::all();
        $sustancias = [];

        return view('sustancia', ['sustancias' => $sustancias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sustancia  $sustancia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sustancia $sustancia)
    {
        //
    }
}
