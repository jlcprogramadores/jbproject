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
    public function __construct()
    {
        $this->middleware('can:empleado-expedientes.index')->only(['index']);
        $this->middleware('can:empleado-expedientes.acciones')->only(['show', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $empleadoExpedientes = EmpleadoExpediente::paginate();
        $empleados = Empleado::orderBy('id','desc')->paginate();

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
            ->with('success', 'Expediente creado exitosamente.');
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

        // if(!isset($empleadoExpediente->empleado_id)){
            // capacitaciones DC3
            $id_dc3 = DB::table('expedientes')
                ->where('nombre','=','capacitaciones_dc3')
                ->get();
            $id_dc3  = $id_dc3->first()->id;
            // amonestación
            $id_cartas_amo = DB::table('expedientes')
                ->where('nombre','=','cartas_amonestacion')
                ->get();
            $id_cartas_amo  = $id_cartas_amo->first()->id;


            $expedientesCargados = DB::table('expedientes')
                ->join('empleado_expedientes', 'empleado_expedientes.expediente_id', '=', 'expedientes.id')
                ->select('empleado_expedientes.id','expedientes.nombre','expedientes.es_multiple','empleado_expedientes.archivo')
                ->where('empleado_expedientes.empleado_id','=',$id)
                ->where('expedientes.id','!=',DB::raw($id_dc3))
                ->where('expedientes.id','!=',DB::raw($id_cartas_amo))
                ->get();

            $whereJoin = [
                ['empleado_expedientes.expediente_id', '=', 'expedientes.id'],
                ['empleado_expedientes.empleado_id','=',DB::raw($id)],
                ['expedientes.es_multiple','=',DB::raw(0)]
            ];
            $expedienteFaltantes = DB::table('expedientes')
                ->leftjoin('empleado_expedientes', $whereJoin)
                ->select('expedientes.id','expedientes.nombre','expedientes.es_multiple')
                ->where('empleado_expedientes.empleado_id','=', null)
                ->where('expedientes.id','!=',DB::raw($id_dc3))
                ->where('expedientes.id','!=',DB::raw($id_cartas_amo))
                ->get();
        // }else{
        //     $expedientesCargados = null;
        //     $id_dc3 = DB::table('expedientes')
        //         ->where('nombre','=','capacitaciones_dc3')
        //         ->get();
        //     $id_dc3 = $id_dc3->first()->id;
            
        //     $expedienteFaltantes = Expediente::all()->where('expedientes.id','!=',DB::raw($id_dc3));

        // }

        return view('empleado-expediente.showPorEmpleado', compact('expedientesCargados','expedienteFaltantes'));
    }

    public function Amonestacion($id)
    {   
        $id_cartas_amo = DB::table('expedientes')
            ->where('nombre','=','cartas_amonestacion')
            ->get();
        $id_cartas_amo  = $id_cartas_amo->first()->id;

        $cartasAmo = DB::table('expedientes')
                ->join('empleado_expedientes', 'empleado_expedientes.expediente_id', '=', 'expedientes.id')
                ->select('empleado_expedientes.id','expedientes.nombre','expedientes.es_multiple','empleado_expedientes.archivo')
                ->where('empleado_expedientes.empleado_id','=',$id)
                ->where('expedientes.id','=',DB::raw($id_cartas_amo))
                ->get();        

        $i = 0;
        return view('empleado-expediente.showAmonestacion', compact('cartasAmo'))->with('i');
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
        $expedientes = Expediente::select('empleado_expedientes.id','expedientes.nombre','expedientes.es_multiple','empleado_expedientes.usuario_edito','empleado_expedientes.updated_at' )
            ->join('empleado_expedientes', 'empleado_expedientes.expediente_id', '=', 'expedientes.id')
            ->where('empleado_expedientes.empleado_id','=',$id_empleado)->paginate();
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
        $emp = Empleado::where('id','=', $id_empleado)->first();
        $empleado = [$emp->id => $emp->nombre];
        // se tiene que hacer un selec en base a los que no tiene aún y los multiples
            $whereJoin = [
                ['empleado_expedientes.expediente_id', '=', 'expedientes.id'],
                ['empleado_expedientes.empleado_id','=',DB::raw($emp->id)],
                ['expedientes.es_multiple','=',DB::raw(0)]
            ];
        $expediente = Expediente::select('expedientes.id','expedientes.nombre','expedientes.es_multiple')
                        ->leftjoin('empleado_expedientes', $whereJoin)
                        ->where('empleado_expedientes.expediente_id','=', null)->paginate();
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
        if ($request->archivo != null) {
            if ($empleadoExpediente->archivo != null) {
                //Existe un archivo anterior
                request()->validate(EmpleadoExpediente::$rules);
                unlink(base_path('storage/app/public/'.explode("/",$empleadoExpediente->archivo)[2]));
                $nombreOriginal = $request->archivo->getClientOriginalName();
                $aux = 'expediente__' . $empleadoExpediente->id . '_';
                $nombreFinal = $aux . $nombreOriginal;
                $request->archivo->storeAs('public',$nombreFinal);
                $file_url = '/storage/' . $nombreFinal;
                $empleadoExpediente->update($request->all());
                $empleadoExpediente->archivo = $file_url;
                $empleadoExpediente->save();
            }else{
                request()->validate(EmpleadoExpediente::$rules);
                $nombreOriginal = $request->archivo->getClientOriginalName();
                $aux = 'expediente__' . $empleadoExpediente->id . '_';
                $nombreFinal = $aux . $nombreOriginal;
                $request->archivo->storeAs('public',$nombreFinal);
                $file_url = '/storage/' . $nombreFinal;
                $empleadoExpediente->update($request->all());
                $empleadoExpediente->archivo = $file_url;
                $empleadoExpediente->save();
            }
        }else{
            request()->validate(EmpleadoExpediente::$rules);
            $empleadoExpediente->update($request->all());
        }

        return redirect()->route('empleado-expedientes.index')
            ->with('success', 'Expediente actualizado correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {   
        $empleadoExpediente = EmpleadoExpediente::find($id);
        $idEmpleado = $empleadoExpediente->empleado_id;
        if ($empleadoExpediente->archivo != null) {
            unlink(base_path('storage/app/public/'.explode("/",$empleadoExpediente->archivo)[2]));
        } 
        $empleadoExpediente = EmpleadoExpediente::find($id)->delete();
        
        return redirect()->route('empleado-expedientes.editExpediente', ['id' =>$idEmpleado])
            ->with('success', 'Expediente eliminado exitosamente.');
    }
}
