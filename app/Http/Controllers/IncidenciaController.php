<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
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
        $incidencias = Incidencia::paginate();

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
        return view('incidencia.create', compact('incidencia'));
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

        return redirect()->route('incidencias.index')
            ->with('success', 'Incidencia created successfully.');
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

        return view('incidencia.edit', compact('incidencia'));
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

        $incidencia->update($request->all());

        return redirect()->route('incidencias.index')
            ->with('success', 'Incidencia updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $incidencia = Incidencia::find($id)->delete();

        return redirect()->route('incidencias.index')
            ->with('success', 'Incidencia deleted successfully');
    }
}
