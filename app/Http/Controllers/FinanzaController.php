<?php

namespace App\Http\Controllers;

use App\Models\Finanza;
use Illuminate\Http\Request;

/**
 * Class FinanzaController
 * @package App\Http\Controllers
 */
class FinanzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finanzas = Finanza::paginate();

        return view('finanza.index', compact('finanzas'))
            ->with('i', (request()->input('page', 1) - 1) * $finanzas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $finanza = new Finanza();
        return view('finanza.create', compact('finanza'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Finanza::$rules);

        $finanza = Finanza::create($request->all());

        return redirect()->route('finanzas.index')
            ->with('success', 'Finanza creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $finanza = Finanza::find($id);

        return view('finanza.show', compact('finanza'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $finanza = Finanza::find($id);

        return view('finanza.edit', compact('finanza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Finanza $finanza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finanza $finanza)
    {
        request()->validate(Finanza::$rules);

        $finanza->update($request->all());

        return redirect()->route('finanzas.index')
            ->with('success', 'Finanza actualizada correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $finanza = Finanza::find($id)->delete();

        return redirect()->route('finanzas.index')
            ->with('success', 'Finanza eliminada exitosamente.');
    }
}
