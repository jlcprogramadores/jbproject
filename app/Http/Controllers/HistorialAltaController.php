<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\HistorialAlta;
use Illuminate\Http\Request;

/**
 * Class HistorialAltaController
 * @package App\Http\Controllers
 */
class HistorialAltaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // se hace que el numero menor sea el más nuevo
        $historialAltas = HistorialAlta::orderBy('id', 'desc')->paginate();

        return view('historial-alta.index', compact('historialAltas'))
            ->with('i', (request()->input('page', 1) - 1) * $historialAltas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $historialAlta = new HistorialAlta();
        $empleado = Empleado::pluck('nombre','id');
        return view('historial-alta.create', compact('historialAlta','empleado'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearporempleado($id)
    {
        $historialAlta = new HistorialAlta();
        $editado = true;
        $empleado = Empleado::where('id','=',$id)->get()[0];
        $empleado = [ $empleado->id => $empleado->nombre ];

        // si no existe ene el historial se pone alta
        $estaEnHistorial = HistorialAlta::where('empleado_id','=',$id)->first();
        if (!is_null($estaEnHistorial)) {
            $max_id = HistorialAlta::where('empleado_id','=',$id)->max('id');
            $ultimo_estado = HistorialAlta::where('id','=',$max_id)->first();
            if($ultimo_estado->tipo){
                $historialAlta->tipo = '0';
                $getEmpleado = Empleado::find($id);
                $getEmpleado->esta_trabajando = 0;
                $getEmpleado->save();
            }else{
                $historialAlta->tipo = '1';
                $getEmpleado = Empleado::find($id);
                $getEmpleado->esta_trabajando = 1;
                $getEmpleado->save();
            }
        }else{
            $historialAlta->tipo = '1';
            $getEmpleado = Empleado::find($id);
            $getEmpleado->esta_trabajando = 1;
            $getEmpleado->save();
        }

        return view('historial-alta.crearporempleado', compact('historialAlta','empleado','editado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(HistorialAlta::$rules);

        $historialAlta = HistorialAlta::create($request->all());

        return redirect()->route('historial-altas.index')
            ->with('success', 'Cambio registrado exitosamente.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeporempleado(Request $request)
    {
        request()->validate(HistorialAlta::$rules);

        $historialAlta = HistorialAlta::create($request->all());

        return redirect()->route('empleados.index')
            ->with('success', 'Cambio registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $historialAlta = HistorialAlta::find($id);

        return view('historial-alta.show', compact('historialAlta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $historialAlta = HistorialAlta::find($id);
        $editado = true;
        $empleado = Empleado::where('id','=',$historialAlta->empleado_id)->get()[0];
        $empleado = [ $empleado->id => $empleado->nombre ];
        return view('historial-alta.edit', compact('historialAlta', 'empleado','editado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  HistorialAlta $historialAlta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistorialAlta $historialAlta)
    {
        request()->validate(HistorialAlta::$rules);

        $historialAlta->update($request->all());

        return redirect()->route('historial-altas.index')
            ->with('success', 'HistorialAlta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $historialAlta = HistorialAlta::find($id)->delete();

        return redirect()->route('historial-altas.index')
            ->with('success', 'HistorialAlta deleted successfully');
    }
}
