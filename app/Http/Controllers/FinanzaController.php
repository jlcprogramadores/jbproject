<?php

namespace App\Http\Controllers;

use App\Models\Finanza;
use App\Models\TipoDeIngreso;
use App\Models\Proyecto;
use App\Models\Familia;
use App\Models\Cliente;
use App\Models\Entrada;
use App\Models\Unidade;
use App\Models\Iva;
use App\Models\Factura;
use App\Models\CategoriasFamilia;
use App\Models\CategoriasDeEntrada;
// para la salida se requiere lo siguiente\
use App\Models\Salida;
use App\Models\Proveedore;



use Illuminate\Http\Request;

/**
 * Class FinanzaController
 * @package App\Http\Controllers
 */
class FinanzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finanzas = Finanza::paginate();

        return view('finanza.index', compact('finanzas'))
            ->with('i', (request()->input('page', 1) - 1) * $finanzas->perPage());
    }

    /**
     * Display a listing of the supplier.
     *
     * @return \Illuminate\Http\Response
     */
    public function ingreso()
    {      
        $entrada = new Entrada();
        $finanza = new Finanza();   
  
        $datostipodeingreso = TipoDeIngreso::pluck('nombre','id');
        $datosproyecto = Proyecto::pluck('nombre','id');
        $datosfamilia = Familia::pluck('nombre','id');
        $datoscategoriasfamilia = CategoriasFamilia::pluck('nombre','id');
        $datoscliente = Cliente::pluck('nombre','id');
        $datoscategoriasdeentrada = CategoriasDeEntrada::pluck('nombre','id');
        $datosunidad = Unidade::pluck('nombre','id');
        $datosiva = Iva::pluck('porcentaje','id');
        $datosfactura = Factura ::pluck('referencia_factura','id');
        return view('finanza.createIngreso', compact('finanza','entrada','datosproyecto','datostipodeingreso','datosfamilia','datoscategoriasfamilia','datoscliente','datoscategoriasdeentrada','datosunidad','datosiva','datosfactura'));        
    }
    /**
     * Display a listing of the supplier.
     *
     * @return \Illuminate\Http\Response
     */
    public function egreso()
    {      
        $salida = new Salida();
        $finanza = new Finanza();   
        
        $datosproveedor = Proveedore::pluck('nombre','id');
        $datosproyecto = Proyecto::pluck('nombre','id');
        $datosfamilia = Familia::pluck('nombre','id');
        $datoscategoriasfamilia = CategoriasFamilia::pluck('nombre','id');
        $datoscategoriasdeentrada = CategoriasDeEntrada::pluck('nombre','id');
        $datosunidad = Unidade::pluck('nombre','id');
        $datosiva = Iva::pluck('porcentaje','id');
        $datosfactura = Factura ::pluck('referencia_factura','id');
        return view('finanza.createEgreso', compact('finanza','salida','datosproyecto','datosfamilia','datoscategoriasfamilia','datosproveedor','datoscategoriasdeentrada','datosunidad','datosiva','datosfactura'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $finanza = new Finanza();
        
        return view('finanza.create', compact('finanza'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeIngreso(Request $request)
    {
        request()->validate(Finanza::$rules);

        $finanza = Finanza::create($request->all());
        $entrada = Entrada::create($request->all());

        return redirect()->route('finanzas.index')
            ->with('success', 'Finanza creada exitosamente.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeEgreso(Request $request)
    {
        request()->validate(Finanza::$rules);

        $finanza = Finanza::create($request->all());
        $salida = Salida::create($request->all());

        return redirect()->route('finanzas.index')
            ->with('success', 'Finanza creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $finanza = Finanza::find($id);

        return view('finanza.show', compact('finanza'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $finanza = Finanza::find($id);

        return view('finanza.edit', compact('finanza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Finanza $finanza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finanza $finanza)
    {
        request()->validate(Finanza::$rules);

        $finanza->update($request->all());

        return redirect()->route('finanzas.index')
            ->with('success', 'Finanza actualizada correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $finanza = Finanza::find($id)->delete();

        return redirect()->route('finanzas.index')
            ->with('success', 'Finanza eliminada exitosamente.');
    }
}
