<?php

namespace App\Http\Controllers;

use App\Models\Subsector;
use App\Models\Sector;
use Illuminate\Http\Request;

class SubsectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subsectores = Subsector::all();

        return view('subsectores', ['subsectores' => $subsectores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subsector = new Subsector();
        $sectores = Sector::all();
        $footer = '';
        $cntnt = '<form action="'. route('subsectores.store').' "method="post">'.
                    view('formSubsector', ['subsector'=>$subsector, 'sectores' => $sectores])->render() .'</form>';
        
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
        Subsector::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subsector  $subsector
     * @return \Illuminate\Http\Response
     */
    public function show($idSubsector)
    {
        $subsector = Subsector::find($idSubsector);

        return view('perfil', ['subsector' => $subsector]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subsector  $subsector
     * @return \Illuminate\Http\Response
     */
    public function edit($idSubsector)
    {
        $subsector = Subsector::find($idSubsector);
        $sectores = Sector::all();
        $footer = '';
        $cntnt = '<form action="'. route('subsectores.update', $subsector->id).' "method="post"> <input type="hidden" name="_method" value="PATCH">'.
                    view('formSubsector', ['subsector'=>$subsector, 'sectores' => $sectores])->render() .'</form>';
        
        return response()->json([
            'bodyContent' => $cntnt,
            'footer' => $footer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subsector  $subsector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idSubsector)
    {
        $subsector = Subsector::find($idSubsector);
        $data = $this->validateData();
        $subsector->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subsector  $subsector
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subsector $subsector)
    {
        //$subsector->delte();

        //return back();
    }

    /** Valida los campos de un Subsector. */
    protected function validateData(){
        return request()->validate([
            'nombre' => 'required|string',
            'idSector' => 'required|integer',
            'descripcion' => 'nullable|string',
        ]);
    }
}
