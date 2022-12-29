<?php

namespace App\Http\Controllers;

use App\Models\EmpleadoExpediente;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Expediente;
use Illuminate\Support\Facades\DB;

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
        
        // $empleadoExpedientes = EmpleadoExpediente::paginate();
        $empleados = Empleado::paginate();

        return view('empleado-expediente.index', compact('empleados'))
            ->with('i', (request()->input('page', 1) - 1) * $empleados->perPage());
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
    
    public function showPorEmpleado($id)
    {
        // contiene los 
        $empleadoExpediente = EmpleadoExpediente::find($id);
        if(isset($empleadoExpediente->empleado_id)){
            $expedientesCargados = Expediente::select('empleado_expedientes.id','expedientes.nombre','expedientes.es_multiple')
                            ->join('empleado_expedientes', 'empleado_expedientes.expediente_id', '=', 'expedientes.id')
                            ->where('empleado_expedientes.empleado_id','=',$id)->get();
        }else{
            $expedientesCargados = null;
        }
        // dd($expedientesCargados);
        if(isset($empleadoExpediente->empleado_id)){
            $whereJoin = [
                ['empleado_expedientes.expediente_id', '=', 'expedientes.id'],
                ['empleado_expedientes.empleado_id','=',DB::raw($id)],
                ['expedientes.es_multiple','=',DB::raw(0)]
            ];
            $expedienteFaltantes = Expediente::select('expedientes.id','expedientes.nombre','expedientes.es_multiple')
                        ->leftjoin('empleado_expedientes', $whereJoin)
                        ->where('empleado_expedientes.expediente_id','=', null)->get();
        }else{
            $expedienteFaltantes = Expediente::all();
        }

        return view('empleado-expediente.showPorEmpleado', compact('expedientesCargados','expedienteFaltantes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function editExpediente($id_empleado)
    {
        
        $empleado = Empleado::find($id_empleado);
        $expedientes = Expediente::select('empleado_expedientes.id','expedientes.nombre','expedientes.es_multiple')
                        ->join('empleado_expedientes', 'empleado_expedientes.expediente_id', '=', 'expedientes.id')
                        ->where('empleado_expedientes.empleado_id','=',$id_empleado)->paginate();
        // dd($expediente);
        // return view('finanza.showdatosfiltrados', compact('finanzas'));
        $i=0;
        return view('empleado-expediente.indexEmpExpedientes', compact('empleado', 'expedientes','i'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function docsFaltantes($id_empleado)
    {
        // dd($id_empleado);
        $emp = Empleado::where('id','=', $id_empleado)->first();
        $empleado = [$emp->id => $emp->nombre];
        // dd($empleado);
        // se tiene que hacer un selec en base a los que no tiene aún y los multiples
            $whereJoin = [
                ['empleado_expedientes.expediente_id', '=', 'expedientes.id'],
                ['empleado_expedientes.empleado_id','=',DB::raw($emp->id)],
                ['expedientes.es_multiple','=',DB::raw(0)]
            ];
        $expediente = Expediente::select('expedientes.id','expedientes.nombre','expedientes.es_multiple')
                        ->leftjoin('empleado_expedientes', $whereJoin)
                        ->where('empleado_expedientes.expediente_id','=', null)->paginate();
        // dd($expediente);

        $i=0;
        return view('empleado-expediente.docsFaltantes', compact('empleado', 'expediente','i'));
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
        $empleado = Empleado::find($empleadoExpediente->empleado_id)->first();

        return view('empleado-expediente.edit', compact('empleadoExpediente','empleado'));
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
