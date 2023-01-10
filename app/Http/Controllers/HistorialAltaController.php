<?php

namespace App\Http\Controllers;

use App\Models\HistorialAlta;
use Illuminate\Http\Request;

/**
 * Class HistorialAltaController
 * @package App\Http\Controllers
 */
class HistorialAltaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historialAltas = HistorialAlta::paginate();

        return view('historial-alta.index', compact('historialAltas'))
            ->with('i', (request()->input('page', 1) - 1) * $historialAltas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $historialAlta = new HistorialAlta();
        return view('historial-alta.create', compact('historialAlta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(HistorialAlta::$rules);

        $historialAlta = HistorialAlta::create($request->all());

        return redirect()->route('historial-altas.index')
            ->with('success', 'HistorialAlta created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $historialAlta = HistorialAlta::find($id);

        return view('historial-alta.show', compact('historialAlta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $historialAlta = HistorialAlta::find($id);

        return view('historial-alta.edit', compact('historialAlta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  HistorialAlta $historialAlta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistorialAlta $historialAlta)
    {
        request()->validate(HistorialAlta::$rules);

        $historialAlta->update($request->all());

        return redirect()->route('historial-altas.index')
            ->with('success', 'HistorialAlta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $historialAlta = HistorialAlta::find($id)->delete();

        return redirect()->route('historial-altas.index')
            ->with('success', 'HistorialAlta deleted successfully');
    }
}
