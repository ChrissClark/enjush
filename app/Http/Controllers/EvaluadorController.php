<?php

namespace App\Http\Controllers;

use App\Models\Evaluador;
use Illuminate\Http\Request;

class EvaluadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluadores = Evaluador::all();

        return view('evaluadores', ['evaluadores' => $evaluadores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evaluador = new Evaluador();
        $footer = '';
        $cntnt = '<form action="'. route('evaluadores.store').' "method="post">'.
                    view('formEvaluador', ['evaluador'=>$evaluador])->render() .'</form>';
        
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
        Evaluador::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evaluador  $evaluador
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluador $evaluador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evaluador  $evaluador
     * @return \Illuminate\Http\Response
     */
    public function edit($idEvaluador)
    {
        $evaluador = Evaluador::find($idEvaluador);
        $footer = '';
        $cntnt = '<form action="'. route('evaluadores.update', $evaluador->id).' "method="post"> <input type="hidden" name="_method" value="PATCH">'.
                    view('formEvaluador', ['evaluador'=>$evaluador])->render() .'</form>';
        
        return response()->json([
            'bodyContent' => $cntnt,
            'footer' => $footer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evaluador  $evaluador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idEvaluador)
    {
        $evaluador = Evaluador::find($idEvaluador);
        $data = $this->validateData();
        $evaluador->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaluador  $evaluador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluador $evaluador)
    {
        //$evaluador->delte();

        //return back();
    }

    /** Valida los campos de un Evaluador. */
    protected function validateData(){
        return request()->validate([
            'nombre' => 'required|string',
        ]);
    }
}
