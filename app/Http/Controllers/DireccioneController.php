<?php

namespace App\Http\Controllers;

use App\Models\Direccione;
use Illuminate\Http\Request;
use App\Models\Proveedore;
use App\Models\Cliente;
use App\Models\TipoDeDireccione;

/**
 * Class DireccioneController
 * @package App\Http\Controllers
 */
class DireccioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direcciones = Direccione::paginate();

        return view('direccione.index', compact('direcciones'))
            ->with('i', (request()->input('page', 1) - 1) * $direcciones->perPage());
    }

    /**
     * Display a listing of the supplier.
     *
     * @return \Illuminate\Http\Response
     */
    public function direccionproveedor($id)
    {    
        $direcciones = Direccione::where('proveedor_id', $id)->paginate();
        return view('direccione.direccionproveedor', compact('direcciones','id'))
            ->with('i', (request()->input('page', 1) - 1) * $direcciones->perPage());
    }

    /**
     * Display a listing of clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function direccioncliente($id)
    {   
        $direcciones = Direccione::where('cliente_id', $id)->paginate();
        return view('direccione.direccioncliente', compact('direcciones'))
            ->with('i', (request()->input('page', 1) - 1) * $direcciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $direccione = new Direccione();
        $proveedores = Proveedore::pluck('nombre','id');
        $cliente = Cliente::pluck('nombre','id');
        $tipodedireccione = TipoDeDireccione::pluck('nombre','id');

        return view('direccione.create', compact('direccione','proveedores','cliente','tipodedireccione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Direccione::$rules);

        $direccione = Direccione::create($request->all());

        return redirect()->route('direcciones.index')
            ->with('success', 'Direccion creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $direccione = Direccione::find($id);

        return view('direccione.show', compact('direccione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $direccione = Direccione::find($id);
        $proveedores = Proveedore::pluck('nombre','id');
        $cliente = Cliente::pluck('nombre','id');
        $tipodedireccione = TipoDeDireccione::pluck('nombre','id');

        return view('direccione.edit', compact('direccione','proveedores','cliente','tipodedireccione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Direccione $direccione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Direccione $direccione)
    {
        request()->validate(Direccione::$rules);

        $direccione->update($request->all());

        return redirect()->route('direcciones.index')
            ->with('success', 'Direccion actualizada correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $direccione = Direccione::find($id)->delete();

        return redirect()->route('direcciones.index')
            ->with('success', 'Direccion eliminada exitosamente.');
    }
}
