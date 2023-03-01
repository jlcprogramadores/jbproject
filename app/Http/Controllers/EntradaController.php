<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\TipoDeIngreso;
use App\Models\CategoriasDeEntrada;
use App\Models\Proyecto;
// use Excel;
// use Importer;
use Rap2hpoutre\FastExcel\FastExcel;
/**
 * Class EntradaController
 * @package App\Http\Controllers
 */
class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entradas = Entrada::paginate();

        return view('entrada.index', compact('entradas'))
            ->with('i', (request()->input('page', 1) - 1) * $entradas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entrada = new Entrada();
        $cliente = Cliente::pluck('nombre','id');
        $tipodeingreso = TipoDeIngreso::pluck('nombre','id');
        $categoriasdeentrada = CategoriasDeEntrada::pluck('nombre','id');
        $proyecto = Proyecto::pluck('nombre','id');

        return view('entrada.create', compact('entrada','cliente','tipodeingreso','categoriasdeentrada','proyecto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Entrada::$rules);

        $entrada = Entrada::create($request->all());

        return redirect()->route('entradas.index')
            ->with('success', 'Entrada creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entrada = Entrada::find($id);

        return view('entrada.show', compact('entrada'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entrada = Entrada::find($id);
        $cliente = Cliente::pluck('nombre','id');
        $tipodeingreso = TipoDeIngreso::pluck('nombre','id');
        $categoriasdeentrada = CategoriasDeEntrada::pluck('nombre','id');
        $proyecto = Proyecto::pluck('nombre','id');
        
        return view('entrada.edit', compact('entrada','cliente','tipodeingreso','categoriasdeentrada','proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Entrada $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entrada $entrada)
    {
        request()->validate(Entrada::$rules);

        $entrada->update($request->all());

        return redirect()->route('entradas.index')
            ->with('success', 'Entrada actualizada correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $entrada = Entrada::find($id)->delete();

        return redirect()->route('entradas.index')
            ->with('success', 'Entrada eliminada exitosamente.');
    }
    
    
    public function exel(Request $request)
    {
        // $file = 
        $path = $request->file('file')->getRealPath();
        $collection = (new FastExcel)->import($path);
        dd($collection);
        // $excel = Importer::make('Excel');
        // $excel->load($path);
        // $collection = $excel->getCollection();
        // dd($collection);
        // // $datos = Excel::load($path )->get();
        // dd($datos->count());
        // $datos = $datos->toArray();
        // for ($i=0; $i < count($datos) ; $i++) { 
        //     $datosImportar[] = $datos [$i];
        // }

        // dd($datosImportar);
    }



}
