<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Grupo;
use App\Models\GruposEmpleado;
use App\Models\Puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


/**
 * Class GrupoController
 * @package App\Http\Controllers
 */
class GrupoController extends Controller
{   
    public function __construct()
    {
        $this->middleware('can:grupos.index')->only(['index']);
        $this->middleware('can:grupos.acciones')->only(['show', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo::paginate();

        return view('grupo.index', compact('grupos'))
            ->with('i', (request()->input('page', 1) - 1) * $grupos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupo = new Grupo();
        $puestos = Puesto::pluck('nombre','id');
        $queryEmpleado = Empleado::where('esta_trabajando','=', 1)->get();
        $empleados = [];
        foreach($queryEmpleado as $empleado){
            $concatenado = isset($empleado->proyecto->mina) ? '-'.$empleado->proyecto->mina->abreviacion : '';


            $fecha = $empleado->fecha_no_empleado ? Carbon::parse($empleado->fecha_no_empleado)->format('dmy') : '';
            $empleados[$empleado->id] = ('# JB-' . $fecha . '-' . $empleado->no_empleado . $concatenado . ' ' . $empleado->nombre );
        }
        return view('grupo.create', compact('grupo','puestos','empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!is_null($request->empleado[0]['empleado_id'])){
            request()->validate(Grupo::$rules);
            $arrIdEmp = array();
            foreach($request->empleado as $iterEmpleado){
                $arrIdEmp[] = $iterEmpleado['empleado_id'];
            }
            if (!(count($arrIdEmp) !== count(array_unique($arrIdEmp)))) {
                $grupo = Grupo::create($request->all());
                foreach($request->empleado as $iterEmpleado){
                    $crearEmpleado = [
                        'grupo_id' => $grupo->id,
                        'empleado_id' => $iterEmpleado['empleado_id'],
                        'puesto_id' => $iterEmpleado['puesto_id'],
                        'salario' => $iterEmpleado['salario'],
                        'usuario_edito' => $grupo->usuario_edito,
                    ];
                    $empleado = GruposEmpleado::create($crearEmpleado);
                }
                return redirect()->route('grupos.index')
                ->with('success', 'Grupo creado exitosamente.');

            }else{
                return redirect()->route('grupos.index')
                ->with('danger', 'ERROR el grupo tiene empleados repetidos.');
            }
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
        $grupo = Grupo::find($id);

        return view('grupo.show', compact('grupo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupo = Grupo::find($id);
        $empleados = Empleado::pluck('nombre','id');
        $numeros = Empleado::pluck('no_empleado','id');
        $puestos = Puesto::pluck('nombre','id');
        return view('grupo.edit', compact('grupo','puestos','empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Grupo $grupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grupo $grupo)
    {
        request()->validate(Grupo::$rules);

        $grupo->update($request->all());

        return redirect()->route('grupos.index')
            ->with('success', 'Grupo actualizado exitosamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // se elimina de grupos_emplados despues el grupo
        $GruposEmp = GruposEmpleado::where('grupo_id', $id)->get();
        foreach($GruposEmp as $item){
            $item->delete();
        }
        $grupo = Grupo::find($id)->delete();

        return redirect()->route('grupos.index')
            ->with('success', 'Grupo eliminado exitosamente.');
    }
}
