<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\GruposEmpleado;
use App\Models\Grupo;
use App\Models\HistorialParo;
use App\Models\Proyecto;
use App\Models\Paro;
use App\Models\Puesto;
use Illuminate\Http\Request;

/**
 * Class ParoController
 * @package App\Http\Controllers
 */
class ParoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paros = Paro::paginate();

        return view('paro.index', compact('paros'))
            ->with('i', (request()->input('page', 1) - 1) * $paros->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paro = new Paro();
        $proyecto = Proyecto::pluck('nombre','id');
        $grupo = Grupo::pluck('nombre','id');
        return view('paro.create', compact('paro','proyecto','grupo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Paro::$rules);

        $params = $request->request->all();
        $empleados = GruposEmpleado::where('grupo_id','=',$params['grupo_id'])->get();
        $nombreGrupo = Grupo::select('nombre')->where('id','=',$params['grupo_id'])->first();
        $paro = Paro::create($request->all());

        foreach($empleados as $empleado){
            $crearHistorialParos = [
                'paro_id' =>  $paro->id,
                'grupo_id' => $params['grupo_id'],
                'empleado_id' => $empleado->empleado_id,
                'puesto_id' => $empleado->puesto_id,
                'salario' => $empleado->salario,
                'fecha_inicio' => $paro->fecha_inicio,
                'fecha_fin' => $paro->fecha_fin,
                'nombre_grupo' => $nombreGrupo->nombre,
                'comentario' => $paro->comentario,
                'usuario_edito' => $paro->usuario_edito,
            ];
            $historialParo = HistorialParo::create($crearHistorialParos);
        } 

        return redirect()->route('paros.index')
            ->with('success', 'Paro creado exitosamente.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createParoGrupo()
    {   
        $grupo = new Grupo();
        $paro = new Paro();
        $proyecto = Proyecto::pluck('nombre','id');
        $empleados = Empleado::pluck('nombre','id');
        $numeros = Empleado::pluck('no_empleado','id');
        $puestos = Puesto::pluck('nombre','id');

        foreach($numeros as $i => $valor){
            $empleados[$i] = (' # ' . $valor . ' ' . $empleados[$i] );
        }

        return view('paro.createParoGrupo', compact('paro','grupo','proyecto','empleados','puestos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeParoGrupo(Request $request)
    {   
        if(!is_null($request->empleado[0]['empleado_id'])){
            request()->validate(Grupo::$rules);
            $arrIdEmp = array();
            foreach($request->empleado as $iterEmpleado){
                $arrIdEmp[] = $iterEmpleado['empleado_id'];
            }

            if (!(count($arrIdEmp) !== count(array_unique($arrIdEmp)))) {
                $crearGrupo = [
                    'nombre' => $request->nombreGrupo,
                    'usuario_edito' => $request->usuario_edito,
                ];
                $grupo = Grupo::create($crearGrupo);

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

                $crearParo = [
                    'nombre' => $request->nombre,
                    'proyecto_id' => $request->proyecto_id,
                    'grupo_id' => $grupo->id,
                    'fecha_inicio' => $request->fecha_inicio,
                    'fecha_fin' => $request->fecha_fin,
                    'comentario' => $request->comentario,
                    'usuario_edito' => $grupo->usuario_edito,
                ];

                $paro = Paro::create($crearParo);
                $empleados = GruposEmpleado::where('grupo_id','=',$grupo->id)->get();

                foreach($empleados as $empleado){
                    $crearHistorialParos = [
                        'paro_id' =>  $paro->id,
                        'grupo_id' => $grupo->id,
                        'empleado_id' => $empleado->empleado_id,
                        'puesto_id' => $empleado->puesto_id,
                        'salario' => $empleado->salario,
                        'fecha_inicio' => $paro->fecha_inicio,
                        'fecha_fin' => $paro->fecha_fin,
                        'nombre_grupo' =>  $request->nombreGrupo, 
                        'comentario' => $paro->comentario,
                        'usuario_edito' => $paro->usuario_edito,
                    ];
                    $historialParo = HistorialParo::create($crearHistorialParos);
                } 
                return redirect()->route('paros.index')
                    ->with('success', 'Paro creado exitosamente.');
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
        $paro = Paro::find($id);

        return view('paro.show', compact('paro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paro = Paro::find($id);
        $proyecto = Proyecto::pluck('nombre','id');
        $grupo = Grupo::pluck('nombre','id');

        return view('paro.edit', compact('paro','proyecto','grupo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Paro $paro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paro $paro)
    {
        request()->validate(Paro::$rules);

        $paro->update($request->all());

        return redirect()->route('paros.index')
            ->with('success', 'Paro actualizado correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $paro = Paro::find($id)->delete();

        return redirect()->route('paros.index')
            ->with('success', 'Paro eliminado exitosamente.');
    }
}
