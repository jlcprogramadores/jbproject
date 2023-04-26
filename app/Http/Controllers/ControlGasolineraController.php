<?php

namespace App\Http\Controllers;

use App\Models\ControlGasolinera;
use App\Models\Destino;
use App\Models\Gasolinera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ControlGasolineraController
 * @package App\Http\Controllers
 */
class ControlGasolineraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $controlGasolineras = ControlGasolinera::paginate();

        return view('control-gasolinera.index', compact('controlGasolineras'))
            ->with('i', (request()->input('page', 1) - 1) * $controlGasolineras->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $controlGasolinera = new ControlGasolinera();
        $gasolinera = Gasolinera::pluck('nombre','id');
        $destino = Destino::pluck('nombre','id');
        return view('control-gasolinera.create', compact('controlGasolinera','gasolinera','destino'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ControlGasolinera::$rules);
        $controlGasolinera = ControlGasolinera::create($request->all());
        if ($controlGasolinera->vale_archivo != null) {
            $nombre = 'controlGas_'.$controlGasolinera->id.'_'.$controlGasolinera->vale_archivo->getClientOriginalName();
            $controlGasolinera->vale_archivo->storeAs('public',$nombre);
            $getGasolinera = ControlGasolinera::find($controlGasolinera->id);
            $getGasolinera->vale_archivo = '/storage/'.$nombre;
            $getGasolinera->save();
        }

        return redirect()->route('control-gasolineras.index')
            ->with('success', 'Control de Gasolinera creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $controlGasolinera = ControlGasolinera::find($id);

        return view('control-gasolinera.show', compact('controlGasolinera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $controlGasolinera = ControlGasolinera::find($id);
        $gasolinera = Gasolinera::pluck('nombre','id');
        $destino = Destino::pluck('nombre','id');

        return view('control-gasolinera.edit', compact('controlGasolinera','gasolinera','destino'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ControlGasolinera $controlGasolinera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ControlGasolinera $controlGasolinera)
    {
        request()->validate(ControlGasolinera::$rules);

        if ($request->vale_archivo != null) {
            if ($controlGasolinera->vale_archivo != null) {
                $fileGasolinera = base_path('storage/app/public/'.explode("/",$controlGasolinera->vale_archivo)[2]);
                if(file_exists($fileGasolinera)){
                    unlink($fileGasolinera);
                }
            }
            $nombre = 'controlGas_'.$controlGasolinera->id.'_'. $request->vale_archivo->getClientOriginalName();
            $request->vale_archivo->storeAs('public',$nombre);
            $controlGasolinera->update($request->all());
            $controlGasolinera->vale_archivo = '/storage/'.$nombre;
            $controlGasolinera->save();  
        }else{
            $controlGasolinera->update($request->all());
        }
        return redirect()->route('control-gasolineras.index')
            ->with('success', 'Control de Gasolinera actualizado exitosamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {   
        $controlGasolinera = ControlGasolinera::find($id);
        if ($controlGasolinera->vale_archivo != null) {
            $fileImagen = base_path('storage/app/public/'.explode("/",$controlGasolinera->vale_archivo)[2]);
            if(file_exists($fileImagen)){
                unlink($fileImagen);
            }
        }
        $controlGasolinera ->delete();

        return redirect()->route('control-gasolineras.index')
            ->with('success', 'Control de Gasolinera eliminado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function graficasGasolinerasRango()
    {   
        $gasolinera = Gasolinera::pluck('nombre','id');
        return view('control-gasolinera.graficasGasolinerasRango', compact('gasolinera'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function graficasRango(Request $request)
    {   
        $desde=$request->desde;
        $hasta=$request->hasta;
        $gasolinera = Gasolinera::find($request->gasolinera_id);
        $nombreGasolinera = $gasolinera->nombre;
        DB::statement("SET lc_time_names = 'es_ES'");
        $egresos = DB::table('control_gasolineras')
        ->select(DB::raw('YEAR(fecha) AS anio'),DB::raw('MONTHNAME(fecha) AS mes'), DB::raw('SUM(total_factura_neto) AS gasto_total'))
        ->where('gasolinera_id','=',$request->gasolinera_id)
        ->groupBy(DB::raw('YEAR(fecha)'))
        ->groupBy(DB::raw('MONTHNAME(fecha)'))
        ->get();
        
        $fecha = []; 
        $gasto_total = []; 
        foreach($egresos as $key => $egreso)
        {   
            $fechaAux = $egreso->mes . ' - ' . $egreso->anio;
            array_push($fecha, $fechaAux);  
            array_push($gasto_total, $egreso->gasto_total);    
        }

        return view('control-gasolinera.graficasRango', compact('fecha','gasto_total','nombreGasolinera','desde','hasta'));
    }
}
