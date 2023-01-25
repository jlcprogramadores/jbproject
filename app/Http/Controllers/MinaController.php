<?php

namespace App\Http\Controllers;

use App\Models\Mina;
use App\Models\Proyecto;
use Illuminate\Http\Request;

/**
 * Class MinaController
 * @package App\Http\Controllers
 */
class MinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $minas = Mina::paginate();

        return view('mina.index', compact('minas'))
            ->with('i', (request()->input('page', 1) - 1) * $minas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mina = new Mina();
        return view('mina.create', compact('mina'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Mina::$rules);

        $mina = Mina::create($request->all());

        return redirect()->route('minas.index')
            ->with('success', 'Mina creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mina = Mina::find($id);

        return view('mina.show', compact('mina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mina = Mina::find($id);

        return view('mina.edit', compact('mina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Mina $mina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mina $mina)
    {
        request()->validate(Mina::$rules);

        $mina->update($request->all());

        return redirect()->route('minas.index')
            ->with('success', 'Mina actualizada correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $relacionProyecto = Proyecto::select('id')->where('mina_id','=',$id)->first();
        if(!is_null($relacionProyecto)){
            return redirect()->route('minas.index')
                ->with('danger', 'No se elimino la mina por que existen proyectos relacionados.');
        }else{
            $mina = Mina::find($id)->delete();
            return redirect()->route('minas.index')
                ->with('success', 'Mina eliminada correctamente.');
        }
    }
}
