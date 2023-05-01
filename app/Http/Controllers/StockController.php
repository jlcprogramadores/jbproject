<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Proveedore;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function entradas()
    {
        $stocks = Stock::where('es_entrada',1)->orderBy('id','desc')->paginate();
        
        return view('stock.entradas', compact('stocks'))
            ->with('i', (request()->input('page', 1) - 1) * $stocks->perPage());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function salidas()
    {
        $stocks = Stock::where('es_entrada',0)->orderBy('id','desc')->paginate();

        return view('stock.salidas', compact('stocks'))
            ->with('i', (request()->input('page', 1) - 1) * $stocks->perPage());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resumen()
    {   
        $query = DB::select(DB::raw(" 
            SELECT
                p.id,
                p.codigo,
                p.descripcion,
                p.marca,
                p.modelo,
                @entradas := (SELECT SUM(stocks.cantidad) FROM stocks WHERE stocks.producto_id = p.id AND stocks.es_entrada = 1) entradas,
                @salidas := (SELECT SUM(stocks.cantidad) FROM stocks WHERE stocks.producto_id = p.id AND stocks.es_entrada = 0) salidas,
                @stocks := p.stock stocks,
                p.precio_unitario,
                ( @stocks * p.precio_unitario ) importe,
                p.minimo,
                p.maximo 
            FROM
                productos AS p
            ORDER BY p.id DESC
        "));
        $i=0;
        return view('stock.resumen', compact('query','i'));
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
        $producto = Producto::select(DB::raw("CONCAT(descripcion, ' (hay ', stock,')') as descripcion"), 'id')
            ->pluck('descripcion','id');
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
        $producto = Producto::select(DB::raw("CONCAT(descripcion, ' (hay ', stock,')') as descripcion"), 'id')
            ->where('stock', '>', 0)
            ->pluck('descripcion','id');
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
        $es_entrada = $request->es_entrada;
        $numero_factura = $request->numero_factura ?? null;
        $dateNow = Carbon::now()->toDateTimeString();

        DB::beginTransaction();
        try {
            // iterar los productos y guardarlos con la misma información 
            if(!$productos){
                    throw new \Exception('No Seleccionaste Productos.');
            }
            // si es una salida valido si alguno no puede por la cantidad 
            if (!$es_entrada) {
                foreach ($productos as $key => $value) {
                    $producto = Producto::find($key);
                    if ($value['cantidad'] > $producto->stock ) {
                        throw new \Exception('No Hay Stock Suficiente En '.$producto->descripcion.'.');
                    }
                }
            }
            
            foreach ($productos as $key => $value) {
                // actualizamos el campo de stock
                $producto = Producto::find($key);
                if ($es_entrada) {
                    $producto->stock = $producto->stock + $value['cantidad'];
                    $producto->save();
                }else{
                    $producto->stock = $producto->stock - $value['cantidad'];
                    $producto->save();
                }


                $datos = [
                    'producto_id' => $key,
                    'proveedor_id' => $proveedor_id,
                    'destino' => $destino,
                    'fecha' => $fecha,
                    'lote' => $lote,
                    'cantidad' => $value['cantidad'],
                    'numero_factura' => $numero_factura,
                    'usuario_edito' => $usuario_edito,
                    'es_entrada' => $es_entrada,
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow,
                ];
                $stock = Stock::create($datos);
            }
            DB::commit();
            return redirect()->route($es_entrada ? 'stocks.entradas' : 'stocks.salidas')
                ->with('success', 'Operación Realizasa Satisfactoriamente.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route($es_entrada ? 'stocks.entradas' : 'stocks.salidas')
                    ->with('danger', $e->getMessage());
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
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function editentradas($id)
    {
        $stock = Stock::find($id);
        $findprove = Proveedore::find($stock->proveedor_id);
        $proveedor = [$stock->proveedor_id => $findprove->nombre ];
        $findProd = Producto::find($stock->producto_id);
        $producto = [$stock->producto_id => $findProd->descripcion ];

        return view('stock.editentradas', compact('stock','proveedor','producto'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function editsalidas($id)
    {
        $stock = Stock::find($id);
        $findProd = Producto::find($stock->producto_id);
        $producto = [$stock->producto_id => $findProd->descripcion ];

        return view('stock.editsalidas', compact('stock','producto'));
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
