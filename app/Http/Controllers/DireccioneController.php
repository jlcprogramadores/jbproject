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
    public function __construct()
    {
        $this->middleware('can:direcciones.index')->only(['index']);
        $this->middleware('can:direcciones.acciones')->only(['show', 'edit', 'update', 'destroy']);
    }

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
        $direcciones = Direccione::where('proveedor_id', $id)->orderBy('id','desc')->paginate();
        // encuentra el nombre del primer proveedor
        $nombre = Proveedore::where('id','=',$id)->first()->nombre;
        return view('direccione.direccionproveedor', compact('direcciones','id','nombre'))
            ->with('i', (request()->input('page', 1) - 1) * $direcciones->perPage());
    }

    /**
     * Display a listing of clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function direccioncliente($id)
    {   
        $direcciones = Direccione::where('cliente_id', $id)->orderBy('id','desc')->paginate();
        // encuentra el nombre del primer cliente
        $nombre = Cliente::where('id','=',$id)->first()->nombre;
        return view('direccione.direccioncliente', compact('direcciones','id','nombre'))
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

        if($request->has('cliente_id')){
            return redirect()->route('direcciones.direccioncliente', ['id' => $request->cliente_id])
            ->with('success', 'Dirección creada exitosamente.');
        }else{
            return redirect()->route('direcciones.direccionproveedor', ['id' => $request->proveedor_id])
            ->with('success', 'Dirección creada exitosamente.');
        }  
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

        if($request->has('cliente_id')){
            return redirect()->route('direcciones.direccioncliente', ['id' => $request->cliente_id])
            ->with('success', 'Dirección actualizada correctamente.');
        }else{
            return redirect()->route('direcciones.direccionproveedor', ['id' => $request->proveedor_id])
            ->with('success', 'Dirección actualizada correctamente.');
        }  
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {   
        $direccion = Direccione::find($id);
        $idAux = $direccion->cliente_id;
        if($direccion->cliente_id != null){
            $idAux = $direccion->cliente_id;
            $direccion = Direccione::find($id)->delete();
            return redirect()->route('direcciones.direccioncliente', ['id' => $idAux])
            ->with('success', 'Dirección eliminada correctamente.');
        }else{
            $idAux = $direccion->proveedor_id;
            $direccion = Direccione::find($id)->delete();
            return redirect()->route('direcciones.direccionproveedor', ['id' => $idAux])
            ->with('success', 'Dirección eliminada correctamente.');
        } 

    }
}
