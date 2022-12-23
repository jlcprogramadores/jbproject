<?php

namespace App\Http\Controllers;

use App\Models\EmpleadoExpediente;
use Illuminate\Http\Request;

/**
 * Class EmpleadoExpedienteController
 * @package App\Http\Controllers
 */
class EmpleadoExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleadoExpedientes = EmpleadoExpediente::paginate();

        return view('empleado-expediente.index', compact('empleadoExpedientes'))
            ->with('i', (request()->input('page', 1) - 1) * $empleadoExpedientes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleadoExpediente = new EmpleadoExpediente();
        return view('empleado-expediente.create', compact('empleadoExpediente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EmpleadoExpediente::$rules);

        $empleadoExpediente = EmpleadoExpediente::create($request->all());

        return redirect()->route('empleado-expedientes.index')
            ->with('success', 'EmpleadoExpediente created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleadoExpediente = EmpleadoExpediente::find($id);

        return view('empleado-expediente.show', compact('empleadoExpediente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleadoExpediente = EmpleadoExpediente::find($id);

        return view('empleado-expediente.edit', compact('empleadoExpediente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EmpleadoExpediente $empleadoExpediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmpleadoExpediente $empleadoExpediente)
    {
        request()->validate(EmpleadoExpediente::$rules);

        $empleadoExpediente->update($request->all());

        return redirect()->route('empleado-expedientes.index')
            ->with('success', 'EmpleadoExpediente updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $empleadoExpediente = EmpleadoExpediente::find($id)->delete();

        return redirect()->route('empleado-expedientes.index')
            ->with('success', 'EmpleadoExpediente deleted successfully');
    }
}
