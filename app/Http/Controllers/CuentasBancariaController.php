<?php

namespace App\Http\Controllers;

use App\Models\CuentasBancaria;
use Illuminate\Http\Request;
use App\Models\Proveedore;

/**
 * Class CuentasBancariaController
 * @package App\Http\Controllers
 */
class CuentasBancariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentasBancarias = CuentasBancaria::paginate();

        return view('cuentas-bancaria.index', compact('cuentasBancarias'))
            ->with('i', (request()->input('page', 1) - 1) * $cuentasBancarias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cuentasBancaria = new CuentasBancaria();
        $proveedore = Proveedore::pluck('nombre','id');

        return view('cuentas-bancaria.create', compact('cuentasBancaria','proveedore'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CuentasBancaria::$rules);

        $cuentasBancaria = CuentasBancaria::create($request->all());

        return redirect()->route('cuentas-bancarias.index')
            ->with('success', 'Cuenta bancaria creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuentasBancaria = CuentasBancaria::find($id);

        return view('cuentas-bancaria.show', compact('cuentasBancaria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuentasBancaria = CuentasBancaria::find($id);
        $proveedore = Proveedore::pluck('nombre','id');

        return view('cuentas-bancaria.edit', compact('cuentasBancaria','proveedore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CuentasBancaria $cuentasBancaria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CuentasBancaria $cuentasBancaria)
    {
        request()->validate(CuentasBancaria::$rules);

        $cuentasBancaria->update($request->all());

        return redirect()->route('cuentas-bancarias.index')
            ->with('success', 'Cuenta Bancaria actualizada correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cuentasBancaria = CuentasBancaria::find($id)->delete();

        return redirect()->route('cuentas-bancarias.index')
            ->with('success', 'Cuenta Bancaria eliminada exitosamente.');
    }
}
