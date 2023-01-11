<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\GruposEmpleado;
use Illuminate\Http\Request;

/**
 * Class GrupoController
 * @package App\Http\Controllers
 */
class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo::paginate();

        return view('grupo.index', compact('grupos'))
            ->with('i', (request()->input('page', 1) - 1) * $grupos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupo = new Grupo();
        return view('grupo.create', compact('grupo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Grupo::$rules);
        $grupo = Grupo::create($request->all());

        if(!is_null($request->factura[0]['empleado_id'])){
            // se iteran las facturas que se ñadieron en egresos
            foreach($request->factura as $iterFactura){
                $crearFactura = [
                    'grupo_id' => $grupo->id,
                    'empleado_id' => $iterFactura['empleado_id'],
                    'puesto_id' => $iterFactura['puesto_id'],
                    'salario' => $iterFactura['salario'],
                    'usuario_edito' => $grupo->usuario_edito,
                ];
                $factura = GruposEmpleado::create($crearFactura);
            }
        }
       
        return redirect()->route('grupos.index')
            ->with('success', 'Grupo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grupo = Grupo::find($id);

        return view('grupo.show', compact('grupo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupo = Grupo::find($id);

        return view('grupo.edit', compact('grupo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Grupo $grupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grupo $grupo)
    {
        request()->validate(Grupo::$rules);

        $grupo->update($request->all());

        return redirect()->route('grupos.index')
            ->with('success', 'Grupo actualizado exitosamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $grupo = Grupo::find($id)->delete();

        return redirect()->route('grupos.index')
            ->with('success', 'Grupo eliminado exitosamente.');
    }
}
