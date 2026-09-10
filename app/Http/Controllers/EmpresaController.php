<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\NRA;
use App\Models\Estado;
use App\Models\Sector;
use App\Models\Evaluacion;
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
        //$slp = Empresa::where('idMunicipio', 1861)->first();//1861 SLP, SLP
        
        return view('empresas.empresas', ['empresas' => $empresas]);
    }

    /**
     * Muestra el formulario para crear una nueva empresa.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresa = new Empresa();
        $estados = Estado::orderBy('nombre')->get();
        $sectores = Sector::orderBy('nombre')->get();
        $footer = '';
        $cntnt = '<form action="'.route('empresas.store').'" method="post" id="formEmpresa">'.
                    view('empresas.formEmpresa', ['empresa'=>$empresa, 'estados'=>$estados, 'sectores'=>$sectores])->render() .
                '</form>';
        
        return response()->json([
            'bodyContent' => $cntnt,
            'footer' => $footer
        ]);
    }

    /**
     * Almacena una nueva empresa si todos los campos son válidos de lo contrario muestra errores.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateData();
        $request->validate(['NRA' => 'required'],['NRA.required' => 'El NRA es obligatorio.']);
        $empresa = Empresa::create($data);
        $nra = NRA::create(['NRA' => $data['NRA'], 'idEmpresa' => $empresa->id]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Empresa creada exitosamente',
                'empresa' => $empresa
            ]);
        }

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
        $cntnt = '<form action="'. route('empresas.update', $empresa->id).' "method="post" id="formEmpresa">'.
                    method_field('PATCH') .
                    view('empresas.formEmpresa', ['empresa'=>$empresa, 'estados'=>$estados, 'sectores'=>$sectores])->render() .
                '</form>';
        
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
        if(!empty($data['NRA'])) {
            NRA::create(['NRA' => $data['NRA'], 'idEmpresa' => $empresa->id]);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Empresa actualizada exitosamente',
                'empresa' => $empresa
            ]);
        }

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
        $empresa->delete();

        return back();
    }

    /** Valida los campos de una empresa. */
    protected function validateData(){
        return request()->validate([
            'nombre' => 'required|string',
            'NRA' => 'nullable|alpha_num|max:20',
            'idMunicipio' => 'required|integer',
            'idSubsector' => 'required|integer',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
        ],
        [
            'nombre.required' => 'El nombre es obligatorio.',
            'NRA.alpha_num' => 'El NRA debe ser alfanumérico.',
            'NRA.max' => 'El NRA no puede tener más de 20 caracteres.',
            'idMunicipio.required' => 'El municipio es obligatorio.',
            'idMunicipio.integer' => 'El municipio es obligatorio.',
            'idSubsector.required' => 'El subsector es obligatorio.',
            'idSubsector.integer' => 'El subsector es obligatorio.',
            'latitud.numeric' => 'La latitud debe ser un número (coordenada).',
            'longitud.numeric' => 'La longitud debe ser un número (coordenada).',
        ]);
    }
}
