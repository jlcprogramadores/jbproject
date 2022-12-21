<?php

namespace App\Http\Controllers;

use App\Models\CuentasBancaria;
use App\Models\Proveedore;
use App\Models\Salida;
use Illuminate\Http\Request;
use App\Models\Telefono;
use App\Models\Direccione;
/**
 * Class ProveedoreController
 * @package App\Http\Controllers
 */
class ProveedoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedore::paginate();

        return view('proveedore.index', compact('proveedores'))
            ->with('i', (request()->input('page', 1) - 1) * $proveedores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedore = new Proveedore();
        return view('proveedore.create', compact('proveedore'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Proveedore::$rules);

        $proveedore = Proveedore::create($request->all());

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedore = Proveedore::find($id);

        return view('proveedore.show', compact('proveedore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedore = Proveedore::find($id);

        return view('proveedore.edit', compact('proveedore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proveedore $proveedore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedore $proveedore)
    {
        request()->validate(Proveedore::$rules);

        $proveedore->update($request->all());

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor actualizado correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $provedorSalida = Salida::select('id')->where('proveedor_id','=',$id)->first();
        if(!is_null($provedorSalida)){
            return redirect()->route('proveedores.index')
                ->with('danger', 'No se elimino Proveedor por que existen finanzas relacionadas.');
        }else{
            // eliminamos direcciones y telefono
            $proveedore = Proveedore::find($id);
            $id_cliente = $proveedore->id;
            $telefonos = Telefono::where('proveedor_id','=',$id_cliente)->get();
            foreach($telefonos as $iterTelefonos){
                $iterTelefonos->delete();
            }
            $direccion = Direccione::where('proveedor_id','=',$id_cliente)->get();
            foreach($direccion as $iterDireccion){
                $iterDireccion->delete();
            }
            $cuentas = CuentasBancaria::where('proveedore_id','=',$id_cliente)->get();
            foreach($cuentas as $iterCuentas){
                $iterCuentas->delete();
            }
            $proveedore->delete();
            
            return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor eliminado exitosamente.');
        }
    }
}
