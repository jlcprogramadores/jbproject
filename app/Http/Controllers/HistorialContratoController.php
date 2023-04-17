<?php

namespace App\Http\Controllers;

use App\Models\HistorialContrato;
use App\Models\Empleado;
use Illuminate\Http\Request;

/**
 * Class HistorialContratoController
 * @package App\Http\Controllers
 */
class HistorialContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($empleado_id)
    {
        $historialContratos = HistorialContrato::where('empleado_id',$empleado_id)->paginate();
        $nombre = Empleado::find($empleado_id)->nombre;

        return view('historial-contrato.index', compact('historialContratos','empleado_id','nombre'))
            ->with('i', (request()->input('page', 1) - 1) * $historialContratos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $historialContrato = new HistorialContrato();
        return view('historial-contrato.create', compact('historialContrato'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(HistorialContrato::$rules);

        $historialContrato = HistorialContrato::create($request->all());
        if ($historialContrato->contrato != null) {
            $nombre = 'hcontrato_'.$historialContrato->id.'_'.$historialContrato->contrato->getClientOriginalName();
            $historialContrato->contrato->storeAs('public',$nombre);
            $getHistorialContrato = HistorialContrato::find($historialContrato->id);
            $getHistorialContrato->contrato = '/storage/'.$nombre;
            $getHistorialContrato->save();
        }
        return redirect()->route('historial-contrato.index',$historialContrato->empleado_id)
            ->with('success', 'HistorialContrato created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $historialContrato = HistorialContrato::find($id);

        return view('historial-contrato.show', compact('historialContrato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $historialContrato = HistorialContrato::find($id);

        return view('historial-contrato.edit', compact('historialContrato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  HistorialContrato $historialContrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistorialContrato $historialContrato)
    {
        request()->validate(HistorialContrato::$rules);

        if ($request->contrato != null) {
            if ($historialContrato->contrato != null) {
                $fileImagen = base_path('storage/app/public/'.explode("/",$historialContrato->contrato)[2]);
                if(file_exists($fileImagen)){
                    unlink($fileImagen);
                }
            }
            $nombre = 'hcontrato_'.$historialContrato->id.'_'. $request->contrato->getClientOriginalName();
            $request->contrato->storeAs('public',$nombre);
            $historialContrato->update($request->all());
            $historialContrato->contrato = '/storage/'.$nombre;
            $historialContrato->save();  
        }else{
            $historialContrato->update($request->all());
        }

        return redirect()->route('historial-contrato.index',$historialContrato->empleado_id)
            ->with('success', 'HistorialContrato updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $historialContrato = HistorialContrato::find($id);
        if ($historialContrato->contrato != null) {
            $fileImagen = base_path('storage/app/public/'.explode("/",$historialContrato->contrato)[2]);
            if(file_exists($fileImagen)){
                unlink($fileImagen);
            }
        }
        $historialContrato->delete();
        return redirect()->route('historial-contrato.index',$historialContrato->empleado_id)
            ->with('success', 'HistorialContrato deleted successfully');
    }
}
