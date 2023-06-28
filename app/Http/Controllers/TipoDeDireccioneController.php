<?php

namespace App\Http\Controllers;

use App\Models\TipoDeDireccione;
use App\Models\Direccione;
use Illuminate\Http\Request;

/**
 * Class TipoDeDireccioneController
 * @package App\Http\Controllers
 */
class TipoDeDireccioneController extends Controller
{   
    public function __construct()
    {
        $this->middleware('can:tipo-de-direcciones.index')->only(['index']);
        $this->middleware('can:tipo-de-direcciones.acciones')->only(['show', 'edit', 'update', 'destroy']);
    }
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
            ->with('success', 'Tipo de Direccion creada exitosamente.');
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
            ->with('success', 'Tipo de Direccion actualizada correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {

        $tipoDeDireccionDirecciones = Direccione::select('id')->where('tipo_de_direccione_id','=',$id)->first();
        if(!is_null($tipoDeDireccionDirecciones)){
            return redirect()->route('tipo-de-direcciones.index')
                ->with('danger', 'No se elimino Tipo de Direccion por que existen finanzas relacionadas.');
        }else{
        $tipoDeDireccione = TipoDeDireccione::find($id)->delete();
            return redirect()->route('tipo-de-direcciones.index')
                ->with('success', 'Tipo de Direccion eliminado exitosamente.');
        }
    }
}
