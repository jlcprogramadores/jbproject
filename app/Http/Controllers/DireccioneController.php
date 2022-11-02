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

    // public function index($product_id)
    // {
    //     $product = Product::where('user_id', Auth::id())->where('id', $product_id)->firstOrFail();
    //     $projects = Project::where('product_id', $product->id))->latest()->paginate(20);

    //     return view('projects.index', compact('projects'))
    //         ->with('i', (request()->input('page', 1) - 1) * 5);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {   
        $direcciones = Direccione::where('proveedor_id', 1)->paginate();
        
        return view('direccione.index2', compact('direcciones'))
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
