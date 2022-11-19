<?php

namespace App\Http\Controllers;

use App\Models\Salida;
use Illuminate\Http\Request;
use App\Models\Proveedore;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;


/**
 * Class SalidaController
 * @package App\Http\Controllers
 */
class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salidas = Salida::paginate();

        return view('salida.index', compact('salidas'))
            ->with('i', (request()->input('page', 1) - 1) * $salidas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salida = new Salida();
        $proveedore = Proveedore::pluck('nombre','id');

        return view('salida.create', compact('salida','proveedore'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Salida::$rules);
        
        $salida = Salida::create($request->all());

        if ($salida->comprobante != null) {
            $nombreOriginal = $salida->comprobante->getClientOriginalName();
            $aux = 'salida_' . $salida->id . '_';
            $nombreFinal = $aux . $nombreOriginal;
            $salida->comprobante->storeAs('public',$nombreFinal);
            $file_url = '/storage/' . $nombreFinal;
            $getSalida = Salida::find($salida->id);
            $getSalida->comprobante = $file_url;
            $getSalida->save();
        }

        
 
        return redirect()->route('salidas.index')
            ->with('success', 'Salida creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salida = Salida::find($id);

        return view('salida.show', compact('salida'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    
        $salida = Salida::find($id);
        $proveedore = Proveedore::pluck('nombre','id');

        return view('salida.edit', compact('salida','proveedore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Salida $salida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salida $salida)
    {   
        request()->validate(Salida::$rules);
        $getSalida = Salida::find($salida->id);

        
        //Existe un comprobante anterior
        if ($getSalida->comprobante != null) {
            unlink(base_path('storage\app\public\\'.explode("/",$getSalida->comprobante)[2]));
            $salida->update($request->all());
            $nombreOriginal = $salida->comprobante->getClientOriginalName();
            $aux = 'salida_' . $salida->id . '_';
            $nombreFinal = $aux . $nombreOriginal;
            $salida->comprobante->storeAs('public',$nombreFinal);
            $file_url = '/storage/' . $nombreFinal;
            $getSalida = Salida::find($salida->id);
            $getSalida->comprobante = $file_url;
            $getSalida->save();
        }else{
            $nombreOriginal = $request->comprobante->getClientOriginalName();
            $aux = 'salida_' . $getSalida->id . '_';
            $nombreFinal = $aux . $nombreOriginal;
            $request->comprobante->storeAs('public',$nombreFinal);
            $file_url = '/storage/' . $nombreFinal;
            $getSalida = Salida::find($getSalida->id);
            $getSalida->comprobante = $file_url;
            $getSalida->save();
        }
        
        return redirect()->route('salidas.index')
            ->with('success', 'Salida actualizada correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {   
        $getSalida = Salida::find($id);
        if ($getSalida->comprobante != null) {
            unlink(base_path('storage\app\public\\'.explode("/",$getSalida->comprobante)[2]));
            
        }   

        $salida = Salida::find($id)->delete();

        return redirect()->route('salidas.index')
            ->with('success', 'Salida eliminada exitosamente.');
    }
}
