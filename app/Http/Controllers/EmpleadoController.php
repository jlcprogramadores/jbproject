<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
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
        $empleados = Empleado::paginate();

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
        $capacitaciones = DB::table('expedientes')
                ->join('empleado_expedientes', 'empleado_expedientes.expediente_id', '=', 'expedientes.id')
                ->select('empleado_expedientes.id','expedientes.nombre','expedientes.es_multiple','empleado_expedientes.archivo')
                ->where('empleado_expedientes.empleado_id','=',$id)
                ->where('expedientes.id','=',DB::raw(30))
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
        $proyectos = Proyecto::all();

        foreach ($proyectos as $proyecto => $value) {
            $costos[] =array(
                "id_proyecto"=> $value->id,
                "nombre"=>$value->nombre,
                "costo_nomina"=>Empleado::where('proyecto_id','=', $value->id)->where('proyecto_id', '=', $value->id)->sum('salario_real'), 
                "total_empleados" => Empleado::where('proyecto_id','=', $value->id)->where('proyecto_id', '=', $value->id)->count()
            );

            $listas[] =array(
                "lista"=> Empleado::select('nombre')->where('proyecto_id','=',$value->id)->get()
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
        $empleados = Empleado::where('proyecto_id','=', $request->id)->where('proyecto_id', '=', $request->id)->get();
        $puestos = Puesto::pluck('nombre','id');
        
        return view('empleado.poblaciondetalle', compact('empleados','puestos','proyecto'))->with('i');
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
        $empleado = Empleado::find($id)->delete();

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado eliminado exitosamente.');
    }
}
