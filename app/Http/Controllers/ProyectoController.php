<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Finanza;
use App\Models\Incidencia;
use App\Models\Mina;
use App\Models\Paro;
use App\Models\Proyecto;
use Illuminate\Http\Request;

/**
 * Class ProyectoController
 * @package App\Http\Controllers
 */
class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::paginate();

        return view('proyecto.index', compact('proyectos'))
            ->with('i', (request()->input('page', 1) - 1) * $proyectos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyecto = new Proyecto();
        $mina = Mina::pluck('nombre','id');
        return view('proyecto.create', compact('proyecto','mina'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Proyecto::$rules);

        $proyecto = Proyecto::create($request->all());

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyecto = Proyecto::find($id);

        return view('proyecto.show', compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyecto = Proyecto::find($id);
        $mina = Mina::pluck('nombre','id');

        return view('proyecto.edit', compact('proyecto','mina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proyecto $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        request()->validate(Proyecto::$rules);

        $proyecto->update($request->all());

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto actualizado correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $relacionFinanza = Finanza::select('id')->where('proyecto_id','=',$id)->first();
        $relacionEmpleados = Empleado::select('id')->where('proyecto_id','=',$id)->first();
        $relacionParos = Paro::select('id')->where('proyecto_id','=',$id)->first();
        $relacionIncidencias = Incidencia::select('id')->where('proyecto_id','=',$id)->first();
        if(!is_null($relacionFinanza) || !is_null($relacionEmpleados) || !is_null($relacionParos)|| !is_null($relacionIncidencias) ){
            return redirect()->route('proyectos.index')
                ->with('danger', 'No se elimino Proyecto por que existen finanzas relacionadas.');
        }else{
            $proyecto = Proyecto::find($id)->delete();
            return redirect()->route('proyectos.index')
                ->with('success', 'Proyecto eliminado exitosamente.');
        }
    }
}
