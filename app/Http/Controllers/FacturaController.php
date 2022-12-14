<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use App\Models\Finanza;

/**
 * Class FacturaController
 * @package App\Http\Controllers
 */
class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = Factura::paginate();

        return view('factura.index', compact('facturas'))
            ->with('i', (request()->input('page', 1) - 1) * $facturas->perPage());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function facturafinanzas($id)
    {
        $facturas = Factura::where('finanza_id', $id)->paginate();

        return view('factura.facturafinanzas', compact('facturas','id'))
            ->with('i', (request()->input('page', 1) - 1) * $facturas->perPage());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $factura = new Factura();
        $datofinanza = Finanza::pluck('descripcion','id');
        return view('factura.create', compact('factura','datofinanza'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        request()->validate(Factura::$rules);
        $factura = Factura::create($request->all());
        if ($factura->factura_base64 != null) {
            $nombreOriginal = $factura->factura_base64->getClientOriginalName();
            $aux = 'factura_' . $factura->id . '_';
            $nombreFinal = $aux . $nombreOriginal;
            $factura->factura_base64->storeAs('public',$nombreFinal);
            $file_url = '/storage/' . $nombreFinal;
            $getFactura = Factura::find($factura->id);
            $getFactura->factura_base64 = $file_url;
            $getFactura->save();
        }

        return redirect()->route('facturas.facturafinanzas', ['id' => $request->finanza_id])
            ->with('success', 'Factura creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $factura = Factura::find($id);

        return view('factura.show', compact('factura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $factura = Factura::find($id);
        $datofinanza = Finanza::pluck('descripcion','id');
        return view('factura.edit', compact('factura','datofinanza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Factura $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {       
        if ($request->factura_base64 != null) {
            if ($factura->factura_base64 != null) {
                //Existe un factura_base64 anterior
                request()->validate(Factura::$rules);
                // unlink(base_path('storage\app\public\\'.explode("/",$factura->factura_base64)[2]));
                $nombreOriginal = $request->factura_base64->getClientOriginalName();
                $aux = 'factura_' . $factura->id . '_';
                $nombreFinal = $aux . $nombreOriginal;
                $request->factura_base64->storeAs('public',$nombreFinal);
                $file_url = '/storage/' . $nombreFinal;
                $factura->update($request->all());
                $factura->factura_base64 = $file_url;
                $factura->save();
            }else{
                request()->validate(Factura::$rules);
                $nombreOriginal = $request->factura_base64->getClientOriginalName();
                $aux = 'factura_' . $factura->id . '_';
                $nombreFinal = $aux . $nombreOriginal;
                $request->factura_base64->storeAs('public',$nombreFinal);
                $file_url = '/storage/' . $nombreFinal;
                $factura->update($request->all());
                $factura->factura_base64 = $file_url;
                $factura->save();
            }
        }else{
            request()->validate(Factura::$rules);
            $factura->update($request->all());
        }
        
        return redirect()->route('facturas.facturafinanzas', ['id' => $request->finanza_id])
            ->with('success', 'Factura actualizada correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $factura = Factura::find($id);
        $idAux = $factura->finanza_id;
        if ($factura->factura_base64 != null) {
            // unlink(base_path('storage\app\public\\'.explode("/",$factura->factura_base64)[2])); 
        } 
        $factura = Factura::find($id)->delete();

        return redirect()->route('facturas.facturafinanzas', ['id' => $idAux])
        ->with('success', 'Factura eliminada correctamente.');
    }
}
