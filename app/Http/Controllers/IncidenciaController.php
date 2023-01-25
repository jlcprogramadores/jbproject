<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use App\Models\Empleado;
use App\Models\Proyecto;
use Illuminate\Http\Request;

/**
 * Class IncidenciaController
 * @package App\Http\Controllers
 */
class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidencias = Incidencia::orderBy('id','desc')->paginate();

        return view('incidencia.index', compact('incidencias'))
            ->with('i', (request()->input('page', 1) - 1) * $incidencias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $incidencia = new Incidencia();
        $empleado = Empleado::pluck('nombre','id');
        $proyecto = Proyecto::pluck('nombre','id');
        return view('incidencia.create', compact('incidencia','empleado','proyecto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Incidencia::$rules);

        $incidencia = Incidencia::create($request->all());
        if ($incidencia->justificante != null) {
            $nombreOriginal = $incidencia->justificante->getClientOriginalName();
            $aux = 'justificante_' . $incidencia->id . '_';
            $nombreFinal = $aux . $nombreOriginal;
            $incidencia->justificante->storeAs('public',$nombreFinal);
            $file_url = '/storage/' . $nombreFinal;
            $getEmpleado = Incidencia::find($incidencia->id);
            $getEmpleado->justificante = $file_url;
            $getEmpleado->save();
        }
        return redirect()->route('incidencias.index')
            ->with('success', 'Incidencia creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $incidencia = Incidencia::find($id);

        return view('incidencia.show', compact('incidencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $incidencia = Incidencia::find($id);
        $empleado = Empleado::pluck('nombre','id');
        $proyecto = Proyecto::pluck('nombre','id');
        
        return view('incidencia.edit', compact('incidencia','empleado','proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Incidencia $incidencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incidencia $incidencia)
    {
        request()->validate(Incidencia::$rules);
        if ($request->justificante != null) {
            if ($incidencia->justificante != null) {
                unlink(base_path('storage/app/public/'.explode("/",$incidencia->justificante)[2]));
                $nombreOriginal = $request->justificante->getClientOriginalName();
                $aux = 'justificante_' . $incidencia->id . '_';
                $nombreFinal = $aux . $nombreOriginal;
                $request->justificante->storeAs('public',$nombreFinal);
                $file_url = '/storage/' . $nombreFinal;
                $incidencia->update($request->all());
                $incidencia->justificante = $file_url;
                $incidencia->save();
            }else{
                $nombreOriginal = $request->justificante->getClientOriginalName();
                $aux = 'justificante_' . $incidencia->id . '_';
                $nombreFinal = $aux . $nombreOriginal;
                $request->justificante->storeAs('public',$nombreFinal);
                $file_url = '/storage/' . $nombreFinal;
                $incidencia->update($request->all());
                $incidencia->justificante = $file_url;
                $incidencia->save();
            }
        }else{
            $incidencia->update($request->all());
        }
        return redirect()->route('incidencias.index')
            ->with('success', 'Incidencia actualizado correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $incidencia = Incidencia::find($id);
        if ($incidencia->justificante != null) {
            unlink(base_path('storage/app/public/'.explode("/",$incidencia->justificante)[2]));
        } 
        
        $incidencia = Incidencia::find($id)->delete();

        return redirect()->route('incidencias.index')
            ->with('success', 'Incidencia eliminar correctamente.');
    }
}
