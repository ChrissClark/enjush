<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Estado;
use App\Models\Sector;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        //$slp = Empresa::where('idMunicipio', 1861)->first();//1861 SLP
        
        return view('empresas', ['empresas' => $empresas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresa = new Empresa();
        $estados = Estado::orderBy('nombre')->get();
        $sectores = Sector::orderBy('nombre')->get();
        $footer = '';
        $cntnt = '<form action="'. route('empresas.store').' "method="post">'.
                    view('formEmpresa', ['empresa'=>$empresa, 'estados'=>$estados, 'sectores'=>$sectores])->render() .'</form>';
        
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
        Evaluacion::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        $estados = Estado::orderBy('nombre')->get();
        $sectores = Sector::orderBy('nombre')->get();
        $footer = '';
        $cntnt = '<form action="'. route('empresas.update', $empresa->id).' "method="post"> <input type="hidden" name="_method" value="PATCH">'.
                    view('formEmpresa', ['empresa'=>$empresa, 'estados'=>$estados, 'sectores'=>$sectores])->render() .'</form>';
        
        return response()->json([
            'bodyContent' => $cntnt,
            'footer' => $footer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        $data = $this->validateData();
        $empresa->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //$empresa->delte();

        //return back();
    }

    /** Valida los campos de una empresa. */
    protected function validateData(){
        return request()->validate([
            'nombre' => 'required|string',
            'idMunicipio' => 'required|integer',
            'idSubsector' => 'required|integer',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
        ]);
    }
}
