<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;
use App\Models\Evaluador;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluaciones = Evaluacion::all();

        return view('evaluaciones.evaluaciones', ['evaluaciones' => $evaluaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evaluacion = new Evaluacion();
        $evaluadores = Evaluador::all();
        $footer = '';
        $cntnt = '<form action="'. route('evaluaciones.store').' "method="post">'.
                    view('evaluaciones.formEvaluacion', ['evaluacion'=>$evaluacion, 'evaluadores'=>$evaluadores, 'idEmpresa'=>request()->idEmpresa])->render() .'</form>';
        
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
        $data['matriz'] = json_encode(array_map('trim', explode(",", $data['matriz'])));
        Evaluacion::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluacion $evaluacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function edit($idEvaluacion)
    {
        $evaluacion = Evaluacion::find($idEvaluacion);
        $evaluadores = Evaluador::all();
        $idEmpresa = $evaluacion->idEmpresa;
        $footer = '';
        $cntnt = '<form action="'. route('evaluaciones.update', $evaluacion->id).' "method="post"> <input type="hidden" name="_method" value="PATCH">'.
                    view('evaluaciones.formEvaluacion', ['evaluacion'=>$evaluacion, 'evaluadores'=>$evaluadores, 'idEmpresa'=>$idEmpresa])->render() .'</form>';
        
        return response()->json([
            'bodyContent' => $cntnt,
            'footer' => $footer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idEvaluacion)
    {
        $evaluacion = Evaluacion::find($idEvaluacion);
        $data = $this->validateData();
        $data['matriz'] = json_encode(array_map('trim', explode(",", $data['matriz'])));
        $evaluacion->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($idEvaluacion)
    {
        $evaluacion = Evaluacion::find($idEvaluacion);
        $evaluacion->delete();

        return back();
    }

    /** Validate the fields of a Estado. */
    protected function validateData(){
        return request()->validate([
            'idEvaluador' => 'required|integer',
            'idEmpresa' => 'required|integer',
            'matriz' => 'required|string',
            'año' => 'digits:4',
            'unidad' => 'required|string',
        ],
        [
            'idEvaluador.required' => 'El campo Evaluador es obligatorio.',
            'idEmpresa.required' => 'El campo Empresa es obligatorio.',
            'matriz.required' => 'La Matriz es obligatoria.',
            'año.digits' => 'El campo Año debe tener 4 dígitos.',
            'unidad.required' => 'El campo Unidad es obligatorio.',
        ]);
    }
    

    /** Muestra las evaluaciones de una empresa */
    public function evaluacionEmpresas($idEmpresa){
        $empresa = Empresa::find($idEmpresa);
        
        return view('evaluaciones.empresa_evaluaciones', ['empresa' => $empresa]);
    }
}
