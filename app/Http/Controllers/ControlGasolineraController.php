<?php

namespace App\Http\Controllers;

use App\Models\ControlGasolinera;
use Illuminate\Http\Request;

/**
 * Class ControlGasolineraController
 * @package App\Http\Controllers
 */
class ControlGasolineraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $controlGasolineras = ControlGasolinera::paginate();

        return view('control-gasolinera.index', compact('controlGasolineras'))
            ->with('i', (request()->input('page', 1) - 1) * $controlGasolineras->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $controlGasolinera = new ControlGasolinera();
        return view('control-gasolinera.create', compact('controlGasolinera'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ControlGasolinera::$rules);

        $controlGasolinera = ControlGasolinera::create($request->all());

        return redirect()->route('control-gasolineras.index')
            ->with('success', 'ControlGasolinera created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $controlGasolinera = ControlGasolinera::find($id);

        return view('control-gasolinera.show', compact('controlGasolinera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $controlGasolinera = ControlGasolinera::find($id);

        return view('control-gasolinera.edit', compact('controlGasolinera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ControlGasolinera $controlGasolinera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ControlGasolinera $controlGasolinera)
    {
        request()->validate(ControlGasolinera::$rules);

        $controlGasolinera->update($request->all());

        return redirect()->route('control-gasolineras.index')
            ->with('success', 'ControlGasolinera updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $controlGasolinera = ControlGasolinera::find($id)->delete();

        return redirect()->route('control-gasolineras.index')
            ->with('success', 'ControlGasolinera deleted successfully');
    }
}
