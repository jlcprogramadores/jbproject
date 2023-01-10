<?php

namespace App\Http\Controllers;

use App\Models\GruposEmpleado;
use Illuminate\Http\Request;

/**
 * Class GruposEmpleadoController
 * @package App\Http\Controllers
 */
class GruposEmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $gruposEmpleados = GruposEmpleado::paginate();

        // return view('grupos-empleado.index', compact('gruposEmpleados'))
        //     ->with('i', (request()->input('page', 1) - 1) * $gruposEmpleados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $gruposEmpleado = new GruposEmpleado();
        // return view('grupos-empleado.create', compact('gruposEmpleado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate(GruposEmpleado::$rules);

        // $gruposEmpleado = GruposEmpleado::create($request->all());

        // return redirect()->route('grupos-empleados.index')
        //     ->with('success', 'GruposEmpleado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $gruposEmpleado = GruposEmpleado::find($id);

        // return view('grupos-empleado.show', compact('gruposEmpleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $gruposEmpleado = GruposEmpleado::find($id);

        // return view('grupos-empleado.edit', compact('gruposEmpleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  GruposEmpleado $gruposEmpleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GruposEmpleado $gruposEmpleado)
    {
        // request()->validate(GruposEmpleado::$rules);

        // $gruposEmpleado->update($request->all());

        // return redirect()->route('grupos-empleados.index')
        //     ->with('success', 'GruposEmpleado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // $gruposEmpleado = GruposEmpleado::find($id)->delete();

        // return redirect()->route('grupos-empleados.index')
        //     ->with('success', 'GruposEmpleado deleted successfully');
    }
}
