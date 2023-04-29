<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use App\Models\ControlGasolinera;
use Illuminate\Http\Request;

/**
 * Class DestinoController
 * @package App\Http\Controllers
 */
class DestinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinos = Destino::orderBy('id','desc')->paginate();
        
        return view('destino.index', compact('destinos'))
            ->with('i', (request()->input('page', 1) - 1) * $destinos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destino = new Destino();
        return view('destino.create', compact('destino'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Destino::$rules);

        $destino = Destino::create($request->all());

        return redirect()->route('destinos.index')
            ->with('success', 'Destino creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $destino = Destino::find($id);

        return view('destino.show', compact('destino'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $destino = Destino::find($id);

        return view('destino.edit', compact('destino'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Destino $destino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destino $destino)
    {
        request()->validate(Destino::$rules);

        $destino->update($request->all());

        return redirect()->route('destinos.index')
            ->with('success', 'Destino actualizado exitosamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {   
        {   
            $idDestino = ControlGasolinera::select('id')->where('destino_id','=',$id)->first();
            if(!is_null($idDestino)){
                return redirect()->route('destinos.index')
                    ->with('danger', 'No se elimino destino por que existe Control de Gasolinera relacionada.');
            }else{
                $destino = Destino::find($id)->delete();
                return redirect()->route('destinos.index')
                    ->with('success', 'Destino eliminado exitosamente.');
            }
        }
    }
}
