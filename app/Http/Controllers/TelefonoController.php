<?php

namespace App\Http\Controllers;

use App\Models\Telefono;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Proveedore;

/**
 * Class TelefonoController
 * @package App\Http\Controllers
 */
class TelefonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $telefonos = Telefono::paginate();

        return view('telefono.index', compact('telefonos'))
            ->with('i', (request()->input('page', 1) - 1) * $telefonos->perPage());
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function telefonocliente($id)
    {
        $telefonos = Telefono::where('cliente_id', $id)->paginate();
        // encuentra el nombre del primer proveedor
        $nombre = Cliente::pluck('nombre','id')->first();
        return view('telefono.telefonocliente', compact('telefonos','id','nombre'))
            ->with('i', (request()->input('page', 1) - 1) * $telefonos->perPage());
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function telefonoproveedor($id)
    {
        $telefonos = Telefono::where('proveedor_id', $id)->paginate();
        // encuentra el nombre del primer proveedor
        $nombre = Proveedore::pluck('nombre','id')->first();
        return view('telefono.telefonoproveedor', compact('telefonos','id','nombre'))
            ->with('i', (request()->input('page', 1) - 1) * $telefonos->perPage());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $telefono = new Telefono();
        $cliente = Cliente::pluck('nombre','id');
        $proveedore = Proveedore::pluck('nombre','id');

        return view('telefono.create', compact('telefono','cliente','proveedore'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Telefono::$rules);

        $telefono = Telefono::create($request->all());

        return redirect()->route('telefonos.index')
            ->with('success', 'Telefono creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $telefono = Telefono::find($id);

        return view('telefono.show', compact('telefono'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $telefono = Telefono::find($id);
        $cliente = Cliente::pluck('nombre','id');
        $proveedore = Proveedore::pluck('nombre','id');

        return view('telefono.edit', compact('telefono','cliente','proveedore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Telefono $telefono
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Telefono $telefono)
    {
        request()->validate(Telefono::$rules);

        $telefono->update($request->all());

        return redirect()->route('telefonos.index')
            ->with('success', 'Telefono actualizado correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $telefono = Telefono::find($id)->delete();

        return redirect()->route('telefonos.index')
            ->with('success', 'Telefono eliminado exitosamente.');
    }
}
