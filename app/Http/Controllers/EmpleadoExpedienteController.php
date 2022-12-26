<?php

namespace App\Http\Controllers;

use App\Models\EmpleadoExpediente;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Expediente;

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
        $empleado = Empleado::pluck('nombre','id');
        $expediente = Expediente::all();
        return view('empleado-expediente.create', compact('empleadoExpediente','empleado', 'expediente'));
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
        $empleado_id = $request->empleado_id;
        $usuario_edito = $request->usuario_edito;

        foreach ($request->documentos as $expediente_id => $archivo){
            if (is_array($archivo)) {
                foreach($archivo as $iterArchivos){
                    $crearFactura = [
                        'empleado_id' => $empleado_id,
                        'expediente_id' => $expediente_id,
                        'archivo' => $iterArchivos,
                        'usuario_edito' => $usuario_edito,
                    ];
                    $empleadoExpediente = EmpleadoExpediente::create($crearFactura);
                    // parte del jose
                    if ($empleadoExpediente->archivo != null) {
                        $nombreOriginal = $empleadoExpediente->archivo->getClientOriginalName();
                        $aux = 'expediente_' . $empleadoExpediente->id . '_';
                        $nombreFinal = $aux . $nombreOriginal;
                        $empleadoExpediente->archivo->storeAs('public',$nombreFinal);
                        $file_url = '/storage/' . $nombreFinal;
                        $getEmpleadoExpediente = EmpleadoExpediente::find($empleadoExpediente->id);
                        $getEmpleadoExpediente->archivo = $file_url;
                        $getEmpleadoExpediente->save();
                    }
                }
            } else {
                $crearFactura = [
                    'empleado_id' => $empleado_id,
                    'expediente_id' => $expediente_id,
                    'archivo' => $archivo,
                    'usuario_edito' => $usuario_edito,
                ];
                $empleadoExpediente = EmpleadoExpediente::create($crearFactura);
                // parte del jose
                if ($empleadoExpediente->archivo != null) {
                    $nombreOriginal = $empleadoExpediente->archivo->getClientOriginalName();
                    $aux = 'expediente_' . $empleadoExpediente->id . '_';
                    $nombreFinal = $aux . $nombreOriginal;
                    $empleadoExpediente->archivo->storeAs('public',$nombreFinal);
                    $file_url = '/storage/' . $nombreFinal;
                    $getEmpleadoExpediente = EmpleadoExpediente::find($empleadoExpediente->id);
                    $getEmpleadoExpediente->archivo = $file_url;
                    $getEmpleadoExpediente->save();
                }
            }
            
        }
        return redirect()->route('empleado-expedientes.index')
            ->with('success', 'Empleado-Expediente creado exitosamente.');
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
            ->with('success', 'Empleado-Expediente actualizado correctamente.');
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
            ->with('success', 'EmpleadoExpediente eliminado exitosamente.');
    }
}
