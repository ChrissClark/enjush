<?php

namespace App\Http\Controllers;

use App\Models\MatrizAmbiental;
use App\Models\Evaluacion;
use App\Models\Sustancia;
use Illuminate\Http\Request;

class MatrizAmbientalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matriz = MatrizAmbiental::all();

        return view('matriz_ambiental.matriz_ambiental', ['matriz_ambiental' => $matriz]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matriz = new MatrizAmbiental();
        $evaluacion = Evaluacion::find(request()->evaluacion);
        $sustancias = Sustancia::all();
        $footer = '';
        $cntnt = '<form action="'. route('matriza.store').' "method="post">'.
                    view('matriz_ambiental.formMatrizAmbiental', ['matriz' => $matriz, 'evaluacion' => $evaluacion, 'sustancias' => $sustancias])->render() .'</form>';
        
        return response()->json([
            'bodyContent' => $cntnt,
            'footer' => $footer
        ]);
    }

    /**
     * Store a validated and newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateData();
        Matriz::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MatrizAmbiental  $matrizAmbiental
     * @return \Illuminate\Http\Response
     */
    public function show(MatrizAmbiental $matrizAmbiental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MatrizAmbiental  $matrizAmbiental
     * @return \Illuminate\Http\Response
     */
    public function edit($matrizAmbiental)
    {
        $matrizAmbiental = MatrizAmbiental::find($matrizAmbiental);
        $evaluacion = $matrizAmbiental->evaluacion;
        $sustancias = Sustancia::all();
        $footer = '';
        $cntnt = '<form action="'. route('matriza.update', $matrizAmbiental->id).' "method="post"> <input type="hidden" name="_method" value="PATCH">'.
                    view('matriz_ambiental.formMatrizAmbiental', ['matriz'=>$matrizAmbiental, 'evaluacion' => $evaluacion, 'sustancias'=>$sustancias])->render() .'</form>';
        
        return response()->json([
            'bodyContent' => $cntnt,
            'footer' => $footer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MatrizAmbiental  $matrizAmbiental
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $matrizAmbiental)
    {
        $data = $this->validateData();
        $matrizAmbiental = MatrizAmbiental::find($matrizAmbiental);
        $matrizAmbiental->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MatrizAmbiental  $matrizAmbiental
     * @return \Illuminate\Http\Response
     */
    public function destroy($matrizAmbiental)
    {
        $matrizAmbiental = MatrizAmbiental::find($matrizAmbiental);
        $matrizAmbiental->delete();

        return back();
    }

    /** Validate the fields of a Estado. */
    protected function validateData(){
        return request()->validate([
            'idSustancia' => 'required|integer',
            'idEvaluacion' => 'required|integer',
            'matriz' => 'required|string',
            'valor' => 'required|numeric',
        ],
        [
            'idSustancia.required' => 'El campo Sustancia es obligatorio.',
            'idEvaluacion.required' => 'El campo Evaluación es obligatorio.',
            'matriz.required' => 'El campo Matriz es obligatorio.',
            'valor.required' => 'El campo Valor es obligatorio.',
            'valor.numeric' => 'El campo Valor debe ser un número.',
        ]);
    }

    /** Muestra la matriz ambiental de una evaluacion */
    public function matrizEvaluacion($idEvaluacion){
        $evaluacion = Evaluacion::find($idEvaluacion);
        
        return view('matriz_ambiental.matriz_ambiental_evaluacion', ['evaluacion' => $evaluacion]);
    }
}
