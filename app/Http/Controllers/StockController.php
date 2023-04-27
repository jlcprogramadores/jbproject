<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Proveedore;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class StockController
 * @package App\Http\Controllers
 */
class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::paginate();

        return view('stock.index', compact('stocks'))
            ->with('i', (request()->input('page', 1) - 1) * $stocks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createEntrada()
    {
        $stock = new Stock();
        $proveedor = Proveedore::pluck('nombre','id');
        $producto = Producto::pluck('descripcion','id');
        return view('stock.createEntrada', compact('stock','producto','proveedor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSalida()
    {
        $stock = new Stock();
        $proveedor = Proveedore::pluck('nombre','id');
        $producto = Producto::pluck('descripcion','id');
        return view('stock.createSalida', compact('stock','producto','proveedor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Stock::$rules);
        // datos
        $proveedor_id = $request->proveedor_id;
        $fecha = $request->fecha;
        $destino = $request->destino;
        $lote = $request->lote;
        $usuario_edito = $request->usuario_edito;
        $productos = $request->productos;
        $numero_factura = $request->numero_factura ?? null;
        $dateNow = Carbon::now()->toDateTimeString();
        // iterar los productos y guardarlos con la misma información 
        foreach ($productos as $key => $value) {
            $datos = [
                'producto_id' => $key,
                'proveedor_id' => $proveedor_id,
                'destino' => $destino,
                'fecha' => $fecha,
                'lote' => $lote,
                'cantidad' => $value['cantidad'],
                'numero_factura' => $numero_factura,
                'usuario_edito' => $usuario_edito,
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ];
            $stock = Stock::create($datos);
        }

        return redirect()->route('stocks.index')
            ->with('success', 'Stock created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stock = Stock::find($id);

        return view('stock.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stock::find($id);

        return view('stock.edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Stock $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        request()->validate(Stock::$rules);

        $stock->update($request->all());

        return redirect()->route('stocks.index')
            ->with('success', 'Stock updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $stock = Stock::find($id)->delete();

        return redirect()->route('stocks.index')
            ->with('success', 'Stock deleted successfully');
    }
}
