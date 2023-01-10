<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Proyecto;
use App\Models\Paro;
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

        $paro = Paro::create($request->all());

        return redirect()->route('paros.index')
            ->with('success', 'Paro creado exitosamente.');
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
