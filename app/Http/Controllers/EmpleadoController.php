<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\EmpleadoExpediente;
use App\Models\HistorialAlta;
use App\Models\Proyecto;
use App\Models\Puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class EmpleadoController
 * @package App\Http\Controllers
 */
class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::orderBy('id','desc')->paginate();

        return view('empleado.index', compact('empleados'))
            ->with('i', (request()->input('page', 1) - 1) * $empleados->perPage());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function capacitaciones($id)
    {        
        $id_dc3 = DB::table('expedientes')
                ->where('nombre','=','capacitaciones_dc3')
                ->get();
        $id_dc3  = $id_dc3->first()->id;
        $capacitaciones = DB::table('expedientes')
                ->join('empleado_expedientes', 'empleado_expedientes.expediente_id', '=', 'expedientes.id')
                ->select('empleado_expedientes.id','expedientes.nombre','expedientes.es_multiple','empleado_expedientes.archivo')
                ->where('empleado_expedientes.empleado_id','=',$id)
                ->where('expedientes.id','=',DB::raw($id_dc3))
                ->get();        

        $i = 0;
        return view('empleado.showCapacitaciones', compact('capacitaciones'))->with('i');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function poblacion()
    {        
        $proyectos = Proyecto::orderBy('id','desc')->get();

        foreach ($proyectos as $proyecto => $value) {
            $costos[] =array(
                "id_proyecto"=> $value->id,
                "nombre"=>$value->nombre,
                "mina"=>isset($value->mina->nombre) ? $value->mina->nombre : '' ,
                "costo_nomina"=>Empleado::where('proyecto_id','=', $value->id)->where('esta_trabajando','=', 1)->sum('salario_real'), 
                "total_empleados" => Empleado::where('proyecto_id','=', $value->id)->where('esta_trabajando','=', 1)->count()
            );

            $listas[] =array(
                "lista"=> Empleado::select('nombre')->where('proyecto_id','=',$value->id)->where('esta_trabajando','=', 1)->get()
            );
        }
        return view('empleado.poblacion', compact('costos','listas'))->with('i');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function poblaciondetalle(Request $request)
    {        
        $proyecto = Proyecto::select('nombre')->where('id','=',$request->id)->get();
        $empleados = Empleado::where('proyecto_id','=', $request->id)->where('esta_trabajando','=', 1)->get();
        $puestos = Puesto::pluck('nombre','id');
        
        return view('empleado.poblaciondetalle', compact('empleados','puestos','proyecto'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formContrato($id)
    {
        $empleado = Empleado::find($id);

        return view('empleado.formContrato', compact('empleado'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateContrato(Request $request)
    {
        request()->validate(Empleado::$rulesContrato);
        // dd($request->id);
        $empleado = Empleado::find($request->id);

        if ($request->contrato != null) {
            if ($empleado->contrato != null) {
                //Existe un contrato anterior
                unlink(base_path('storage/app/public/'.explode("/",$empleado->contrato)[2]));
                $nombreOriginal = $request->contrato->getClientOriginalName();
                $aux = 'empleado_' . $empleado->id . '_';
                $nombreFinal = $aux . $nombreOriginal;
                $request->contrato->storeAs('public',$nombreFinal);
                $file_url = '/storage/' . $nombreFinal;
                $empleado->update($request->all());
                $empleado->contrato = $file_url;
                $empleado->save();
            }else{
                $nombreOriginal = $request->contrato->getClientOriginalName();
                $aux = 'empleado_' . $empleado->id . '_';
                $nombreFinal = $aux . $nombreOriginal;
                $request->contrato->storeAs('public',$nombreFinal);
                $file_url = '/storage/' . $nombreFinal;
                $empleado->update($request->all());
                $empleado->contrato = $file_url;
                $empleado->save();
            }
        }else{
            // dd($empleado->id);
            $empleado->update($request->all());
        }

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado actualizado correctamente.');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado = new Empleado();
        $puesto = Puesto::pluck('nombre','id');
        $proyecto  = Proyecto::pluck('nombre','id');  
        $totalEmpleados = Empleado::paginate()->count();
        $numEmpleado =  date("dmy");
        $numEmpleado = 'JB-'.$numEmpleado.'-'.($totalEmpleados+1);

        return view('empleado.create', compact('empleado','proyecto','puesto','numEmpleado'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Empleado::$rules);
        $empleado = Empleado::create($request->all());
        if ($empleado->fotografia != null) {
            $nombreOriginal = $empleado->fotografia->getClientOriginalName();
            $aux = 'fotografia_' . $empleado->id . '_';
            $nombreFinal = $aux . $nombreOriginal;
            $empleado->fotografia->storeAs('public',$nombreFinal);
            $file_url = '/storage/' . $nombreFinal;
            $getEmpleado = Empleado::find($empleado->id);
            $getEmpleado->fotografia = $file_url;
            $getEmpleado->save();
        }
        $request->esta_trabajando;
        $comentario = $request->comentario;
        $fechaSuceso = $request->fecha_suceso;

        $crearHistrial = [
            'empleado_id' => $empleado->id,
            'tipo' => $empleado->esta_trabajando,
            'comentario' => $comentario,
            'usuario_edito' => $empleado->usuario_edito,
            'fecha_suceso' => $fechaSuceso,
        ];
        $historialAlta = HistorialAlta::create($crearHistrial);
        return redirect()->route('empleados.index')
            ->with('success', 'Empleado creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);

        return view('empleado.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $proyecto  = Proyecto::pluck('nombre','id');   
        $puesto = Puesto::pluck('nombre','id');
        $numEmpleado = $empleado->no_empleado;

        return view('empleado.edit', compact('empleado','proyecto','puesto','numEmpleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Empleado $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        if ($request->fotografia != null) {
            if ($empleado->fotografia != null) {
                //Existe un fotografia anterior
                request()->validate(Empleado::$rules);
                unlink(base_path('storage/app/public/'.explode("/",$empleado->fotografia)[2]));
                $nombreOriginal = $request->fotografia->getClientOriginalName();
                $aux = 'empleado_' . $empleado->id . '_';
                $nombreFinal = $aux . $nombreOriginal;
                $request->fotografia->storeAs('public',$nombreFinal);
                $file_url = '/storage/' . $nombreFinal;
                $empleado->update($request->all());
                $empleado->fotografia = $file_url;
                $empleado->save();
            }else{
                request()->validate(Empleado::$rules);
                $nombreOriginal = $request->fotografia->getClientOriginalName();
                $aux = 'empleado_' . $empleado->id . '_';
                $nombreFinal = $aux . $nombreOriginal;
                $request->fotografia->storeAs('public',$nombreFinal);
                $file_url = '/storage/' . $nombreFinal;
                $empleado->update($request->all());
                $empleado->fotografia = $file_url;
                $empleado->save();
            }
        }else{
            request()->validate(Empleado::$rules);
            $empleado->update($request->all());
        }

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado actualizado correctamente.');
    }
    

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        
        $empleado = Empleado::find($id);
        if ($empleado->fotografia != null) {
            unlink(base_path('storage/app/public/'.explode("/",$empleado->fotografia)[2]));
        } 
        // elimina el historial despues el empleado
        $hisAlta = HistorialAlta::where('empleado_id', $id)->get();
        foreach($hisAlta as $item){
            $item->delete();
        }
        // eliminamos los archivos del expediente
        $expediente = EmpleadoExpediente::where('empleado_id', $id)->get();
        foreach($expediente as $item){
            if ($item->archivo != null) {
                unlink(base_path('storage/app/public/'.explode("/",$item->archivo)[2]));
            } 
            $item->delete();
        }
        // Así porfin borramos el empleado
        $empleado = Empleado::find($id)->delete();

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado eliminado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function editarfechalimite($id)
    {
        $empleado = Empleado::find($id);

        return view('empleado.editFechaLimite', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Empleado $empleado
     * @return \Illuminate\Http\Response
     */
    public function actualizarfechalimite(Request $request, Empleado $empleado)
    {
        request()->validate(Empleado::$rulesfechalimite);

        $empleadofind = Empleado::find($request->id);
        $empleadofind->fecha_limite_expediente = $request->fecha_limite_expediente;
        $empleadofind->save();        

        return redirect()->route('empleado-expedientes.index')
            ->with('success', 'Fecha limite actualizada correctamente.');
    }
}
