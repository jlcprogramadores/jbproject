<?php

namespace App\Http\Controllers;

use App\Models\Gasolinera;
use Illuminate\Http\Request;

/**
 * Class GasolineraController
 * @package App\Http\Controllers
 */
class GasolineraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gasolineras = Gasolinera::paginate();

        return view('gasolinera.index', compact('gasolineras'))
            ->with('i', (request()->input('page', 1) - 1) * $gasolineras->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gasolinera = new Gasolinera();
        return view('gasolinera.create', compact('gasolinera'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Gasolinera::$rules);

        $gasolinera = Gasolinera::create($request->all());

        return redirect()->route('gasolineras.index')
            ->with('success', 'Gasolinera creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gasolinera = Gasolinera::find($id);

        return view('gasolinera.show', compact('gasolinera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gasolinera = Gasolinera::find($id);

        return view('gasolinera.edit', compact('gasolinera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Gasolinera $gasolinera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gasolinera $gasolinera)
    {
        request()->validate(Gasolinera::$rules);

        $gasolinera->update($request->all());

        return redirect()->route('gasolineras.index')
            ->with('success', 'Gasolinera actualizada exitosamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $gasolinera = Gasolinera::find($id)->delete();

        return redirect()->route('gasolineras.index')
            ->with('success', 'Gasolinera eliminada exitosamente.');
    }
}
