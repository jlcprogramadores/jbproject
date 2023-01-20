<?php

namespace App\Http\Controllers;

use App\Models\CategoriasFamilia;
use App\Models\Empleado;
use App\Models\GruposEmpleado;
use App\Models\Grupo;
use App\Models\Puesto;
use GruposEmpleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $gruposEmpleados = GruposEmpleado::paginate();

        return view('grupos-empleado.index', compact('gruposEmpleados'))
            ->with('i', (request()->input('page', 1) - 1) * $gruposEmpleados->perPage());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function grupoPorEmpleados($id)
    {
        $gruposEmpleados =  GruposEmpleado::where('grupo_id', $id)->paginate();
        $nombre = Grupo::where('id', $id)->get();
        $nombre = $nombre[0]->nombre;
        
        // dd($gruposEmpleados);
        return view('grupos-empleado.grupoPorEmpleados', compact('gruposEmpleados','nombre','id'))
            ->with('i', (request()->input('page', 1) - 1) * $gruposEmpleados->perPage());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formEmpleadoGrupo($idGrupo)
    {   
        $gruposEmpleado = GruposEmpleado::find($idGrupo);
        $puestos = Puesto::pluck('nombre','id');
        $empleados = Empleado::pluck('nombre','id');
        $grupos = Grupo::pluck('nombre','id');
        return view('grupos-empleado.create', compact('gruposEmpleado','puestos','empleados','grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gruposEmpleado = new GruposEmpleado();
        return view('grupos-empleado.create', compact('gruposEmpleado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleados = GruposEmpleado::where('grupo_id','=', $request->all()['grupo_id'])->get();
        
        foreach($empleados as $empleado){
            $myArray[] = $empleado->empleado_id;
        }

        if( !in_array( $request->all()['empleado_id'] ,$myArray ) )
        {
            request()->validate(GruposEmpleado::$rules);
            $gruposEmpleado = GruposEmpleado::create($request->all());
            return redirect()->route('grupos.index')
            ->with('success', 'GruposEmpleado created successfully.');
        }else{
            return redirect()->route('grupos.index')
                ->with('danger', 'ERROR el empleado ya existe en el grupo.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $gruposEmpleado = GruposEmpleado::find($id);

        return view('grupos-empleado.show', compact('gruposEmpleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gruposEmpleado = GruposEmpleado::find($id);
        $puestos = Puesto::pluck('nombre','id');
        $empleados = Empleado::pluck('nombre','id');
        $grupos = Grupo::pluck('nombre','id');

        return view('grupos-empleado.edit', compact('gruposEmpleado','puestos','empleados','grupos'));
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
        request()->validate(GruposEmpleado::$rules);

        $gruposEmpleado->update($request->all());

        return redirect()->route('grupos.index')
            ->with('success', 'Empleado del grupo actualizado exitosamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $gruposEmpleado = GruposEmpleado::find($id)->delete();

        return redirect()->route('grupos-empleados.index')
            ->with('success', 'Empleado del grupo eliminado(a) exitosamente.');
    }

    public function getEmpleadosByGrupo(Request $request)
    {
        $grupo_id = $request->grupo_id;
        $empleadosIds = GruposEmpleado::select('id','empleado_id')->where('grupo_id','=',$grupo_id)->get();

        $myArray = array();
        foreach($empleadosIds as $empleadosId){
            $empleados = DB::table('grupos_empleados')
            ->join('puestos', 'puestos.id', '=', 'grupos_empleados.puesto_id')
            ->join('empleados', 'empleados.id', '=', 'grupos_empleados.empleado_id')
            ->select('grupos_empleados.id', 'empleados.nombre', 'puestos.nombre as puesto', 'grupos_empleados.salario')
            ->where('grupos_empleados.id','=',(($empleadosId->id)))
            ->get();  

            $myArray[] = $empleados;
        }
        return json_encode($myArray);
    }
}
