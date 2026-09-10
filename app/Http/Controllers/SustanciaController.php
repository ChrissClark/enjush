<?php

namespace App\Http\Controllers;

use App\Models\Sustancia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        return view('sustancias.sustancias', ['sustancias' => $sustancias]);
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
                    view('sustancias.formSustancia', ['sustancia'=>$sustancia])->render() .'</form>';
        
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
        return view('sustancias.perfil_sustancia', ['sustancia' => $sustancia]);
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
                    view('sustancias.formSustancia', ['sustancia'=>$sustancia])->render() .'</form>';
        
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
        $sustancia->delete();

        return back();
    }

    /** Valida los campos de una Sustancia. */
    protected function validateData(){
        return request()->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
        ]);
    }

    /** Subir un archivo PDF para una sustancia */
    public function uploadPdf(Request $request, Sustancia $sustancia)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:10240' // máximo 10MB
        ]);

        // Eliminar archivo anterior si existe
        if ($sustancia->pdf_path && Storage::disk('public')->exists($sustancia->pdf_path)) {
            Storage::disk('public')->delete($sustancia->pdf_path);
        }

        // Guardar el nuevo archivo
        $path = $request->file('pdf')->store('sustancias_pdfs', 'public');
        $sustancia->update(['pdf_path' => $path]);

        return response()->json(['success' => true, 'message' => 'PDF subido correctamente']);
    }

    /** Descargar el PDF de una sustancia */
    public function downloadPdf(Sustancia $sustancia)
    {
        if (!$sustancia->pdf_path || !Storage::disk('public')->exists($sustancia->pdf_path)) {
            return response()->json(['success' => false, 'message' => 'No hay archivo PDF disponible'], 404);
        }

        return Storage::disk('public')->download($sustancia->pdf_path);
    }
}
