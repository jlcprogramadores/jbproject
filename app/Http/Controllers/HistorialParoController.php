<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Grupo;
use App\Models\HistorialParo;
use App\Models\Paro;
use Illuminate\Http\Request;

/**
 * Class HistorialParoController
 * @package App\Http\Controllers
 */
class HistorialParoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historialParos = HistorialParo::paginate();
        return view('historial-paro.index', compact('historialParos'))
            ->with('i', (request()->input('page', 1) - 1) * $historialParos->perPage());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function historialempleado($paro_id)
    {
        $historialParos = HistorialParo::where('paro_id',$paro_id)->orderBy('id','desc')->paginate();

        return view('historial-paro.index', compact('historialParos'))
            ->with('i', (request()->input('page', 1) - 1) * $historialParos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $historialParo = new HistorialParo();
        return view('historial-paro.create', compact('historialParo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(HistorialParo::$rules);

        $historialParo = HistorialParo::create($request->all());

        return redirect()->route('historial-paros.index')
            ->with('success', 'HistorialParo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $historialParo = HistorialParo::find($id);

        return view('historial-paro.show', compact('historialParo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $historialParo = HistorialParo::find($id);

        return view('historial-paro.edit', compact('historialParo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  HistorialParo $historialParo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistorialParo $historialParo)
    {
        request()->validate(HistorialParo::$rules);

        $historialParo->update($request->all());

        return redirect()->route('historial-paros.index')
            ->with('success', 'HistorialParo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $historialParo = HistorialParo::find($id)->delete();

        return redirect()->route('historial-paros.index')
            ->with('success', 'HistorialParo deleted successfully');
    }
}
