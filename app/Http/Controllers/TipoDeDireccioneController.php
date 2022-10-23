<?php

namespace App\Http\Controllers;

use App\Models\TipoDeDireccione;
use Illuminate\Http\Request;

/**
 * Class TipoDeDireccioneController
 * @package App\Http\Controllers
 */
class TipoDeDireccioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoDeDirecciones = TipoDeDireccione::paginate();

        return view('tipo-de-direccione.index', compact('tipoDeDirecciones'))
            ->with('i', (request()->input('page', 1) - 1) * $tipoDeDirecciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoDeDireccione = new TipoDeDireccione();
        return view('tipo-de-direccione.create', compact('tipoDeDireccione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TipoDeDireccione::$rules);

        $tipoDeDireccione = TipoDeDireccione::create($request->all());

        return redirect()->route('tipo-de-direcciones.index')
            ->with('success', 'TipoDeDireccione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoDeDireccione = TipoDeDireccione::find($id);

        return view('tipo-de-direccione.show', compact('tipoDeDireccione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoDeDireccione = TipoDeDireccione::find($id);

        return view('tipo-de-direccione.edit', compact('tipoDeDireccione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TipoDeDireccione $tipoDeDireccione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoDeDireccione $tipoDeDireccione)
    {
        request()->validate(TipoDeDireccione::$rules);

        $tipoDeDireccione->update($request->all());

        return redirect()->route('tipo-de-direcciones.index')
            ->with('success', 'TipoDeDireccione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipoDeDireccione = TipoDeDireccione::find($id)->delete();

        return redirect()->route('tipo-de-direcciones.index')
            ->with('success', 'TipoDeDireccione deleted successfully');
    }
}
