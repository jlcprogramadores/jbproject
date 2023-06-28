<?php

namespace App\Http\Controllers;

use App\Models\Familia;
use App\Models\CategoriasFamilia;
use Illuminate\Http\Request;

/**
 * Class FamiliaController
 * @package App\Http\Controllers
 */
class FamiliaController extends Controller
{   
    public function __construct()
    {
        $this->middleware('can:familias.index')->only(['index']);
        $this->middleware('can:familias.acciones')->only(['show', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $familias = Familia::paginate();

        return view('familia.index', compact('familias'))
            ->with('i', (request()->input('page', 1) - 1) * $familias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $familia = new Familia();
        return view('familia.create', compact('familia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Familia::$rules);

        $familia = Familia::create($request->all());

        return redirect()->route('familias.index')
            ->with('success', 'Familia creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $familia = Familia::find($id);

        return view('familia.show', compact('familia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $familia = Familia::find($id);

        return view('familia.edit', compact('familia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Familia $familia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Familia $familia)
    {
        request()->validate(Familia::$rules);

        $familia->update($request->all());

        return redirect()->route('familias.index')
            ->with('success', 'Familia actualizada correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $familiaCateforiaFamilia = CategoriasFamilia::select('id')->where('familia_id','=',$id)->first();
        if(!is_null($familiaCateforiaFamilia)){
            return redirect()->route('familias.index')
                ->with('danger', 'No se elimino Familia por que existen Categoría Familia relacionada.');
        }else{
            $familia = Familia::find($id)->delete();
            return redirect()->route('familias.index')
                ->with('success', 'Familia eliminado exitosamente.');
        }
    }   
    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete($id)
    {
        $project = Familia::find($id);

        return back();
    }
}
