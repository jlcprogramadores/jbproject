<?php

namespace App\Http\Controllers;

use App\Models\Iva;
use App\Models\Entrada;
use App\Models\Finanza;
use Illuminate\Http\Request;

/**
 * Class IvaController
 * @package App\Http\Controllers
 */
class IvaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ivas = Iva::paginate();

        return view('iva.index', compact('ivas'))
            ->with('i', (request()->input('page', 1) - 1) * $ivas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $iva = new Iva();
        return view('iva.create', compact('iva'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Iva::$rules);

        $iva = Iva::create($request->all());

        return redirect()->route('ivas.index')
            ->with('success', 'Iva creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $iva = Iva::find($id);

        return view('iva.show', compact('iva'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $iva = Iva::find($id);

        return view('iva.edit', compact('iva'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Iva $iva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Iva $iva)
    {
        request()->validate(Iva::$rules);

        $iva->update($request->all());

        return redirect()->route('ivas.index')
            ->with('success', 'Iva actualizado correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ivaFinazas = Finanza::select('id')->where('iva_id','=',$id)->first();
        if(!is_null($ivaFinazas)){
            return redirect()->route('ivas.index')
                ->with('danger', 'No se elimino IVA por que existen finanzas relacionadas.');
        }else{
            $iva = Iva::find($id)->delete();
            return redirect()->route('ivas.index')
                ->with('success', 'IVA eliminado exitosamente.');
        }
    }
}
