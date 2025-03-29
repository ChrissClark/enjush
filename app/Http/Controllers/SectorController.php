<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\Subsector;
use App\Models\Estado;
use App\Models\Punto;
use App\Models\Empresa;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectores = Sector::all();

        return view('sectores', ['sectores' => $sectores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sector = new Sector();
        $footer = '';
        $cntnt = '<form action="'. route('sectores.store').' "method="post">'.
                    view('formSector', ['sector'=>$sector])->render() .'</form>';
        
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
        $data = $this->validateData();dd($data);
        Sector::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function show(Sector $sector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function edit($idSector)
    {
        $sector = Sector::find($idSector);
        $footer = '';
        $cntnt = '<form action="'. route('sectores.update', $sector->id).' "method="post"> <input type="hidden" name="_method" value="PATCH">'.
                    view('formSector', ['sector'=>$sector])->render() .'</form>';
        
        return response()->json([
            'bodyContent' => $cntnt,
            'footer' => $footer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idSector)
    {
        $sector = Sector::find($idSector);
        $data = $this->validateData();
        $sector->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sector $sector)
    {
        //$sector->delte();

        //return back();
    }

    /** Valida los campos de un Sector. */
    protected function validateData(){
        return request()->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
        ]);
    }

    public function escenariosExpocicion(){
        /*//dd(Empresa::select('id', 'nombre', 'idMunicipio', 'idSubsector', 'latitud', 'longitud')->get()->toJSON());
        return view('map');*/
        $estados = Estado::all();
        $sectores = Sector::all();
        $idsSubsectores = Subsector::whereIn('idSector', $sectores->pluck('id'))->pluck('id');
        //$puntos = Punto::whereIn('idSubsector', $idsSubsectores)->get();
        $empresas = Empresa::all();

        return view('escenarioexposicion', ['estados' => $estados, 'sectores' => $sectores, 'empresas' => $empresas]); 
    }

    // Obtener puntos para DataTables
    public function getPuntos(Request $request)
    {//dd("Entrando");
        return Empresa::select('id', 'nombre', 'idMunicipio', 'idSubsector', 'latitud', 'longitud')->get()->toJSON();
    }

    // Obtener puntos dentro de un área (Lazy Loading para Leaflet)
    public function getPolygonsByBounds(Request $request)
    {//dd("Entrando Leaflet");
        $northEast = explode(',', $request->northEast);
        $southWest = explode(',', $request->southWest);

        $puntos = Empresa::whereBetween('latitud', [$southWest[0], $northEast[0]])
                       ->whereBetween('longitud', [$southWest[1], $northEast[1]])
                       ->get();

        return response()->json($puntos);
    }

    // Obtener datos para Chart.js
    public function getPolygonData()
    {
        $data = Empresa::selectRaw('nombre, COUNT(*) as total')
                     ->groupBy('nombre')
                     ->get();

        return response()->json([
            'labels' => $data->pluck('nombre'),
            'data' => $data->pluck('total')
        ]);
    }
}
