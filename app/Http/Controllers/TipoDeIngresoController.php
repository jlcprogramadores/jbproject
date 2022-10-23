<?php

namespace App\Http\Controllers;

use App\Models\TipoDeIngreso;
use Illuminate\Http\Request;

/**
 * Class TipoDeIngresoController
 * @package App\Http\Controllers
 */
class TipoDeIngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoDeIngresos = TipoDeIngreso::paginate();

        return view('tipo-de-ingreso.index', compact('tipoDeIngresos'))
            ->with('i', (request()->input('page', 1) - 1) * $tipoDeIngresos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoDeIngreso = new TipoDeIngreso();
        return view('tipo-de-ingreso.create', compact('tipoDeIngreso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TipoDeIngreso::$rules);

        $tipoDeIngreso = TipoDeIngreso::create($request->all());

        return redirect()->route('tipo-de-ingresos.index')
            ->with('success', 'TipoDeIngreso created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoDeIngreso = TipoDeIngreso::find($id);

        return view('tipo-de-ingreso.show', compact('tipoDeIngreso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoDeIngreso = TipoDeIngreso::find($id);

        return view('tipo-de-ingreso.edit', compact('tipoDeIngreso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TipoDeIngreso $tipoDeIngreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoDeIngreso $tipoDeIngreso)
    {
        request()->validate(TipoDeIngreso::$rules);

        $tipoDeIngreso->update($request->all());

        return redirect()->route('tipo-de-ingresos.index')
            ->with('success', 'TipoDeIngreso updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipoDeIngreso = TipoDeIngreso::find($id)->delete();

        return redirect()->route('tipo-de-ingresos.index')
            ->with('success', 'TipoDeIngreso deleted successfully');
    }
}
