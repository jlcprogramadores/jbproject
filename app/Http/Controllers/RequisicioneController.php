<?php

namespace App\Http\Controllers;

use App\Models\Requisicione;
use Illuminate\Http\Request;

/**
 * Class RequisicioneController
 * @package App\Http\Controllers
 */
class RequisicioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisiciones = Requisicione::paginate();

        return view('requisicione.index', compact('requisiciones'))
            ->with('i', (request()->input('page', 1) - 1) * $requisiciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $requisicione = new Requisicione();
        return view('requisicione.create', compact('requisicione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        request()->validate(Requisicione::$rules);
        $controlRequisiciones = Requisicione::create($request->all());
        
        if ($controlRequisiciones->archivo != null) {
            $nombre = 'archivoRequi_'.$controlRequisiciones->id.'_'.$controlRequisiciones->archivo->getClientOriginalName();
            $controlRequisiciones->archivo->storeAs('public',$nombre);
            $getRequisiciones = Requisicione::find($controlRequisiciones->id);
            $getRequisiciones->archivo = '/storage/'.$nombre;
            $getRequisiciones->save();
        }

        if ($controlRequisiciones->comprobante_aprobacion != null) {
            $nombre = 'comprobanteRequi'.$controlRequisiciones->id.'_'.$controlRequisiciones->comprobante_aprobacion->getClientOriginalName();
            $controlRequisiciones->comprobante_aprobacion->storeAs('public',$nombre);
            $getRequisiciones = Requisicione::find($controlRequisiciones->id);
            $getRequisiciones->comprobante_aprobacion = '/storage/'.$nombre;
            $getRequisiciones->save();
        }

        return redirect()->route('requisiciones.index')
            ->with('success', 'Requisición creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requisicione = Requisicione::find($id);

        return view('requisicione.show', compact('requisicione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requisicione = Requisicione::find($id);

        return view('requisicione.edit', compact('requisicione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Requisicione $requisicione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requisicione $requisicione)
    {
        request()->validate(Requisicione::$rules);

        $requisicione->update($request->all());

        return redirect()->route('requisiciones.index')
            ->with('success', 'Requisición actualizada exitosamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $requisicione = Requisicione::find($id)->delete();

        return redirect()->route('requisiciones.index')
            ->with('success', 'Requisición eliminada exitosamente.');
    }
}
