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
use App\Models\Salida;
use App\Models\Proveedore;
use Illuminate\Support\Facades\Storage;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use App\Mail\ComprobanteMailable;
use  Carbon\Carbon;
use Illuminate\Support\Facades\DB;




use Illuminate\Http\Request;

/**
 * Class FinanzaController
 * @package App\Http\Controllers
 */
class FinanzaController extends Controller
{   
    public function __construct()
    {
        $this->middleware('can:finanzas.index')->only(['index']);
        $this->middleware('can:finanzas.indexEgreso')->only(['indexEgreso']);
        $this->middleware('can:finanzas.indexIngreso')->only(['indexIngreso']);
        $this->middleware('can:finanzas.topgeneral')->only(['topGeneral']);
        $this->middleware('can:finanzas.graficas')->only(['graficasGenerales']);
        $this->middleware('can:finanzas.graficas')->only(['graficasProyectos']);
        $this->middleware('can:finanzas.centrodecostos')->only(['centrodecostos']);
        $this->middleware('can:finanzas.filtros')->only(['filtros']);
        $this->middleware('can:finanzas.acciones')->only(['show', 'edit', 'update', 'destroy']);
    }

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

    public function datos(Request $request)
    {        
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        
        // $finanzas = Finanza::skip($start)->take($length)->get();
        $query = "
            SELECT
            f.id,
            f.a_meses 't_meses',
            @s_id := f.salidas_id as 'salidas_id',
            f.no as 'no',
            if(f.esta_atrasado = 1, CONCAT(DATE_FORMAT(f.fecha_entrada, '%Y-%m-%d'), ' ', 'Atrasada'), DATE_FORMAT(f.fecha_entrada, '%Y-%m-%d')) as 'fecha_entrada',
            DATE_FORMAT(f.fecha_salida, '%Y-%m-%d') as 'fecha_salida',
            f.vence as 'vence',
            @fven := DATE_FORMAT(DATE_ADD(f.fecha_salida, INTERVAL f.vence DAY), '%Y-%m-%d') 'fecha_vencimiento',
            @dias := DATEDIFF(@fven, now()) as 'dias',
            if(@dias <= 0, 1, 0) as 'estado',
            if(@s_id is not NULL, 'Egreso', 'Ingreso') as 'tipo_i&e',
            CONCAT((SELECT fam.nombre
                    from familias as fam
                    WHERE fam.id = cf.familia_id), ' - ', cf.nombre) as 'fam_&_cat',
            if(@s_id is not NULL, p.razon_social, c.razon_social) as 'razon_social',
            pro.nombre as 'proyecto',
            f.descripcion as 'descripción',
            (SELECT GROUP_CONCAT(fac.referencia_factura)
                FROM facturas as fac
                WHERE fac.finanza_id = f.id) as 'factura_o_folio',
            if(@s_id is not NULL, p.nombre, c.nombre) as 'proveedor_o_cliente',
            CONCAT(f.cantidad, ' ', u.nombre) 'cantidad_&_unidad',
            CONCAT('$', FORMAT(f.costo_unitario, 2)) as 'costo_unitario',
            CONCAT('$', FORMAT((@subtotal := (f.costo_unitario * f.cantidad)), 2)) as 'subtotal_total_mxn',
            CONCAT(i.porcentaje, ' ', '%') as 'iva',
            CONCAT('$', FORMAT((@subtotal * i.porcentaje), 2)) AS 'total_mxn',
            CONCAT('$', FORMAT(f.monto_a_pagar, 2)) as 'monto_a_pagar',
            DATE_FORMAT(f.fecha_de_pago, '%Y-%m-%d') as 'fecha_de_pago',
            f.metodo_de_pago as 'metodo_de_pago',
            if(f.es_pagado = 0, 1, 0) as 'estatus',
            f.entregado_material_a as 'entregado_material_a',
            if(f.a_meses is not NULL,
                (SELECT GROUP_CONCAT(
                            if(DATE_FORMAT(fac.mes_de_pago, '%Y-%m') = DATE_FORMAT(NOW(), '%Y-%m'),

                                if(fac.monto is not NULL and fac.monto != 0,
                                    CONCAT('<span class=\"badge bg-success\">', DATE_FORMAT(fac.mes_de_pago, '%Y-%m'), ' ', 'Pagado</span>'),
                                    CONCAT('<span class=\"badge bg-warning text-dark\">', DATE_FORMAT(fac.mes_de_pago, '%Y-%m'), ' ', 'Por Vencer</span>')),

                                if(fac.mes_de_pago < NOW(),
                                    if(fac.monto is not NULL and fac.monto != 0,
                                        '',
                                        CONCAT('<span class=\"badge bg-danger\">', DATE_FORMAT(fac.mes_de_pago, '%Y-%m'), ' ', 'Vencido</span>')),
                                        ''
                                )
                            )
                    )
                    FROM facturas as fac
                    WHERE fac.finanza_id = f.id)
                , 'N/A') 'a_meses',
            DATE_FORMAT(f.fecha_facturacion, '%Y-%m-%d') as 'fecha_facturacion',
            f.comentario as 'comentario',
            if(s.enviado = 0, 1, 0) as 'comprobante',
            CONCAT(f.usuario_edito, ' ', f.updated_at) as 'fecha_actualizacion'
            
            FROM
                finanzas as f
            Left JOIN salidas as s ON s.id = f.salidas_id
            Left JOIN proveedores as p ON p.id = s.proveedor_id

            Left JOIN entradas as e ON e.id = f.entradas_id
            Left JOIN clientes as c ON c.id = e.cliente_id

            LEFT JOIN proyectos as pro ON pro.id = f.proyecto_id
            LEFT JOIN unidades as u ON u.id = f.unidad_id
            LEFT JOIN ivas as i ON i.id = f.iva_id
            LEFT JOIN categorias_familias as cf ON cf.id = f.categoria_id
            ORDER BY f.id DESC
            LIMIT ?, ?";

        $finanzas = collect(DB::select($query, [$start, $length]));
        $finanzas = $finanzas->map(function ($finanza) {
            $user = auth()->user();
            // Agregar lógica para la nueva columna
            $finanza->estadoPintado = $finanza->estado ? '<span class="badge bg-danger">Vencido</span>' : '<span class="badge bg-warning text-dark">Por vencer</span>';
            
            if($finanza->factura_o_folio){
                $finanza->facturaPintado = $finanza->factura_o_folio;
            }else{
                $finanza->facturaPintado = $finanza->salidas_id ? '<span class="badge bg-danger">No facturado</span>' : '<span class="badge bg-danger">No Recibida</span>';
            }
            
            if($finanza->factura_o_folio){
                $finanza->esPagadoPintado = $finanza->factura_o_folio;
            }else{
                $finanza->esPagadoPintado = $finanza->salidas_id ? '<span class="badge bg-danger">No facturado</span>' : '<span class="badge bg-danger">No Recibida</span>';
            }
            
            $finanza->estatusPintado = $finanza->estatus ? '<span class="badge bg-danger">Pendiente Pagar</span>' : '<span class="badge bg-success">Pagado</span>' ; 
            
            $finanza->comprobantePintado = $finanza->comprobante ?  '<span class="badge bg-danger">Sin Enviar</span>' : '<span class="badge bg-success">Enviado</span>' ;  
            
            $btns= '';
            $btns .= '<form action="'.route('finanzas.destroy',$finanza->id).'" method="POST" >';
            if ($user->can('finanzas.confirmarpago')) {
                $btns .='<a class="btn btn-sm btn-info"  href="'.route('finanzas.confirmarPago',$finanza->id).'" ><i class="fa fa-fw fa-eye"></i> Actualizar pago </a>';
            }
            if($finanza->salidas_id){
                if ($user->can('finanzas.correo')) {
                    $btns .='<a class="btn btn-sm btn-secondary " href="'.route('finanzas.correo',$finanza->id).'" ><i class="fa fa-fw fa-eye"></i> Correo</a>';
                }
            }
            if ($user->can('facturas.index')) {
                $btns .=' <a class="btn btn-sm btn-warning" href="'.route('facturas.facturafinanzas',$finanza->id).'"><i class="fa fa-fw fa-edit"></i> Factura</a>';
            }
            $btns .='</form>';
            $finanza->actionSpc= $btns;

            $btns= '';
            $btns .= '<form action="'.route('finanzas.destroy',$finanza->id).'" method="POST" >';
            if ($user->can('finanzas.show')) {
                $btns .='<a class="btn btn-sm btn-primary " href="'.route('finanzas.show',$finanza->id).'"><i class="fa fa-fw fa-eye"></i></a>';
            }
            if ($user->can('finanzas.edit')) {
                if($finanza->t_meses){
                    $btns .='<a class="btn btn-sm btn-success" href="'.route('finanzas.editEgresoMeses',$finanza->id).'""><i class="fa fa-fw fa-edit"></i></a>';
                }elseif($finanza->salidas_id){
                    $btns .='<a class="btn btn-sm btn-success" href="'.route('finanzas.editEgreso',$finanza->id).'" ><i class="fa fa-fw fa-edit"></i></a>';
                }else{
                    $btns .=' <a class="btn btn-sm btn-success" href="'.route('finanzas.editIngreso',$finanza->id).'"><i class="fa fa-fw fa-edit"></i></a>';
                }
            }
            if ($user->can('finanzas.destroy')) {
                $btns .='<button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i></button>';
            }
            $btns .='<input type="hidden" name="_token" value=" '.csrf_token().' ">';
            $btns .='</form>';
            $finanza->action = $btns;

            return $finanza;
        });

        $total = Finanza::count();
        
        $response = [
            'draw' => $request->input('draw', 0),
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
            'data' => $finanzas,
        ];
        
        return response()->json($response);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexEgreso()
    {
        $finanzas = Finanza::where('salidas_id','!=',null)->paginate();     
        $esEgreso = true;
        $nombre = 'Egreso';
        return view('finanza.indexEgresoIngreso', compact('finanzas','esEgreso','nombre'))
            ->with('i', (request()->input('page', 1) - 1) * $finanzas->perPage());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexIngreso()
    {
        $finanzas = Finanza::where('entradas_id','!=',null)->paginate();     
        $esEgreso = false;
        $nombre = 'Ingreso';
        return view('finanza.indexEgresoIngreso', compact('finanzas','esEgreso','nombre'))
            ->with('i', (request()->input('page', 1) - 1) * $finanzas->perPage());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function topGeneral()
    {
        $finanzas = Finanza::paginate();     

        return view('finanza.topGeneral', compact('finanzas'))->with('i', (request()->input('page', 1) - 1) * $finanzas->perPage());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function top(Request $request)
    {   
        $tipoFinanza = $request->tipoFinanza;
        $numRegistros = $request->numRegistros;
        // las opciones de tipo de finanza son  0 es egreso, 1 es ingreso
        // y si tipoFinanza == 0 es false
        if($tipoFinanza){ // ingreso
            $nombre = 'Ingreso';
            $finanzas = Finanza::where('entradas_id','!=',null)->orderBy('monto_a_pagar', 'desc')->paginate($numRegistros);
            return view('finanza.indexTop', compact('finanzas','nombre'))
                ->with('i', (request()->input('page', 1) - 1) * $finanzas->perPage());

        }else{ //egreso
            $nombre = 'Egreso';
            $finanzas = Finanza::where('salidas_id','!=',null)->orderBy('monto_a_pagar', 'desc')->paginate($numRegistros);     
            return view('finanza.indexTop', compact('finanzas','nombre'))
                ->with('i', (request()->input('page', 1) - 1) * $finanzas->perPage());

        }
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
     * Display a listing of the supplier.
     *
     * @return \Illuminate\Http\Response
     */
    public function egresoMeses()
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
        return view('finanza.createEgresoMeses', compact('finanza','salida','datosproyecto','datosfamilia','datoscategoriasfamilia','datosproveedor','datoscategoriasdeentrada','datosunidad','datosiva','datosfactura'));        
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
        request()->validate(Finanza::$rulesIngreso);
        // Hay que deteminar si la fecha esta atrasado o no la fecha
        $fechaActual = Carbon::createFromFormat('Y-m-d', $request->fecha_entrada);

        $fechaLimite = Carbon::parse( Carbon::now()->subDay(3))->format('Y-m-d');
        $shippingDate = Carbon::createFromFormat('Y-m-d',$fechaLimite );

        $diferencia_en_dias = $fechaActual->diffInDays($shippingDate,false);
        // cuando es mayor a 1 es que la fecha es positiva antes de los 3 dias por lo que esta retrasado
        if($diferencia_en_dias > 0){
            $request['esta_atrasado'] = 1;

        }
        // se crea la entrada se recupera el id y se anade al request
        $entrada = Entrada::create($request->all());
        $request->request->add(['entradas_id' => $entrada->id]);
        // vamos a poner el  no maximo disponible
        $noMax = Finanza::max('no')+1;
        $request->request->add(['no' => $noMax]);
        $finanza = Finanza::create($request->all());
        // si es almenos una factura se crean
        if(!is_null($request->factura[0]['referencia_factura'])){
            // se iteran las facturas que se ñadieron en egresos
            foreach($request->factura as $iterFactura){
                $crearFactura = [
                    'finanza_id' => $finanza->id,
                    'referencia_factura' => $iterFactura['referencia_factura'],
                    'url' => $iterFactura['url'],
                    'fecha_creacion' => $finanza->updated_at,
                    'fecha_factura' => $iterFactura['fecha_factura'],
                    'monto' => $iterFactura['monto'],
                    'usuario_edito' => $finanza->usuario_edito,
                    'factura_base64' => $iterFactura['factura_base64'],
                ];
                $factura = Factura::create($crearFactura);
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
            }
        }
        return redirect()->route('finanzas.index')
            ->with('success', 'Finanza creada exitosamente con el folio '.$noMax.'.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeEgreso(Request $request)
    {
        request()->validate(Finanza::$rulesEgreso);
        // se crea la salida se recupera el id y se anade al request
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
        //Hasta aqui se añaden los archivos en la tabla
        $request->request->add(['salidas_id' => $salida->id]);
        $noMax = Finanza::max('no')+1;
        $request->request->add(['no' => $noMax]);
        $finanza = Finanza::create($request->all());
        // si es almenos una factura se crean
        if(!is_null($request->factura[0]['referencia_factura'])){
            // se iteran las facturas que se ñadieron en egresos
            foreach($request->factura as $iterFactura){
                $crearFactura = [
                    'finanza_id' => $finanza->id,
                    'referencia_factura' => $iterFactura['referencia_factura'],
                    'url' => $iterFactura['url'],
                    'fecha_creacion' => $finanza->updated_at,
                    'fecha_factura' => $iterFactura['fecha_factura'],
                    'monto' => $iterFactura['monto'],
                    'usuario_edito' => $finanza->usuario_edito,
                    'factura_base64' => $iterFactura['factura_base64'],
                ];
                $factura = Factura::create($crearFactura);
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
            }
        }
        return redirect()->route('finanzas.index')
            ->with('success', 'Finanza creada exitosamente con el folio '.$noMax.'.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeEgresoMeses(Request $request)
    {
        request()->validate(Finanza::$rulesEgresoMeses);
        // se crea la salida se recupera el id y se anade al request
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
        $noMax = Finanza::max('no')+1;
        // dd($noMax);
        //Hasta aqui se añaden los archivos en la tabla
        $request->request->add(['salidas_id' => $salida->id]);

        $request->request->add(['no' => $noMax]);
        $finanza = Finanza::create($request->all());
        // fecha de inicio
        $fechaLimite = Carbon::parse( $finanza->fecha_primer_pago);
        // se crean factura segun el numero de meses 
        for ($i=1; $i < $request->a_meses+1 ; $i++) { 
            $crearFactura = [
                'finanza_id' => $finanza->id,
                'referencia_factura' => null,
                'concepto' => null,
                'url' => null,
                'fecha_creacion' => $finanza->updated_at,
                'fecha_factura' => null,
                'monto' => null,
                'usuario_edito' => $finanza->usuario_edito,
                'factura_base64' => null,
                'comentario_pago' => $i.' de '.$request->a_meses,
                'mes_de_pago' => $fechaLimite->format('Y-m-d')
            ];
            $fechaLimite->addMonth();
            $factura = Factura::create($crearFactura);


        }

        return redirect()->route('finanzas.index')
            ->with('success', 'Finanza creada exitosamente con el folio '.$noMax.'.');
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
        $salida = Salida::find($finanza->salidas_id);
        return view('finanza.show', compact('finanza','salida'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function graficasProyectos()
    {   
        $proyecto = Proyecto::pluck('nombre','id');
        return view('finanza.graficasProyectos', compact('proyecto'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function graficasGenerales()
    {   
        return view('finanza.graficasGenerales');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function graficas(Request $request)
    {   
        if(is_null($request->proyecto_id) == false  ){
            $desde=$request->desde;
            $hasta=$request->hasta;
            $proyecto = Proyecto::find($request->proyecto_id);
            $nombreProyecto = $proyecto->nombre;
            $ingresos = Finanza::where('entradas_id','!=',null)->where('proyecto_id', '=', $request->proyecto_id)->whereBetween('fecha_entrada', [$desde, $hasta])->sum('monto_a_pagar');
            $egresos = Finanza::where('salidas_id','!=',null)->where('proyecto_id', '=', $request->proyecto_id)->whereBetween('fecha_entrada', [$desde, $hasta])->sum('monto_a_pagar');
            return view('finanza.graficas', compact('ingresos','egresos','nombreProyecto','desde','hasta'));

        }else{
            $desde=$request->desde;
            $hasta=$request->hasta;
            $nombreProyecto = "Todos los Proyectos en el Sistema";
            $ingresos = Finanza::where('entradas_id','!=',null)->whereBetween('fecha_entrada', [$desde, $hasta])->sum('monto_a_pagar');
            $egresos = Finanza::where('salidas_id','!=',null)->whereBetween('fecha_entrada', [$desde, $hasta])->sum('monto_a_pagar');
            return view('finanza.graficas', compact('ingresos','egresos','nombreProyecto','desde','hasta'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function centrodecostos()
    {   

        $proyectos = Proyecto::get();
        
        foreach ($proyectos as $proyecto => $value) {
            $finanzas[] =array(
                "id_proyecto"=> $proyecto,
                "nombre"=>$value->nombre,
                "presupuesto"=>$value->presupuesto,
                "margen"=>$value->margen,
                "costo"=>Finanza::where('salidas_id','!=',null)->where('proyecto_id', '=', $proyecto+1)->sum('monto_a_pagar'),
                "utilidad" =>Finanza::where('entradas_id','!=',null)->where('proyecto_id', '=', $proyecto+1)->sum('monto_a_pagar') 
            );
        }
      
        return view('finanza.centrodecostos', compact('finanzas'))->with('i');
    }



    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function correo($id)
    {
        $finanza = Finanza::find($id);
        $salida = Salida::find($finanza->salidas_id);
        $proveedor = Proveedore::find($salida->proveedor_id);
        return view('finanza.correo', compact('finanza','salida','proveedor'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function enviarCorreo($id)
    {   
        $finanza = Finanza::find($id);
        $salida = Salida::find($finanza->salidas_id);
        $proveedor = Proveedore::find($salida->proveedor_id);
        $cantidad = $finanza->monto_a_pagar;
        $comprobante = $salida->comprobante;
        $email = $proveedor->mail;
        $nombreProveedor = $proveedor->nombre; 

        $data = [
            'comprobante' => 'https://mttojbindustrial.com/'.$comprobante,
            'monto_a_pagar' => $cantidad,
            'nombreProveedor' => $nombreProveedor,
        ];

        $correo = new ComprobanteMailable($data);

        try {
            Mail::to($email)->send($correo,$data);
            $salida->enviado = 1;
            $salida->save();
            return redirect()->route('finanzas.index')
            ->with('success', 'Correo enviado exitosamente.');
        } catch (\Exception $e) {
            // dd($e);
            $salida->enviado = 0;
            $salida->save();
            return redirect()->route('finanzas.index')
                ->with('danger', 'No se pudo enviar el correo.');
        }
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
        // si es entrada carga los siguiente
        $esEntrada = false;
        if(isset($finanza->entradas_id)){
            $entrada = Entrada::find($finanza->entradas_id);
            $datoscliente = Cliente::pluck('nombre','id');
            $esEntrada = True;
        }else{
            $salida = Salida::find($finanza->salidas_id);
            $datosproveedor = Proveedore::pluck('nombre','id');
        }
        $datosproyecto = Proyecto::pluck('nombre','id');
        $datostipodeingreso = TipoDeIngreso::pluck('nombre','id');
        $datosfamilia = Familia::pluck('nombre','id');
        $datoscategoriasfamilia = CategoriasFamilia::pluck('nombre','id');
        $datoscategoriasdeentrada = CategoriasDeEntrada::pluck('nombre','id');
        $datosunidad = Unidade::pluck('nombre','id');
        $datosiva = Iva::pluck('porcentaje','id');
        $datosfactura = Factura ::pluck('referencia_factura','id');

        return view('finanza.edit', compact('finanza',$esEntrada ? 'entrada': 'salida',$esEntrada ? 'datoscliente':'datosproveedor','datosproyecto','datostipodeingreso','datosfamilia','datoscategoriasfamilia','datoscategoriasdeentrada','datosunidad','datosiva','datosfactura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Finanza $finanza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finanza $finanza, Salida $salida)
    {   
        if ($request->comprobante != null) {
            if ($finanza->salidas_id != null) {
                $salida = Salida::find($finanza->salidas_id);
                $getSalida = Salida::find($salida->id);
                if ($getSalida->comprobante != null) {
                    //Existe un comprobante anterior
                    unlink(base_path('storage/app/public/'.explode("/",$getSalida->comprobante)[2]));
                    $salida->update($request->all());
                    $nombreOriginal = $salida->comprobante->getClientOriginalName();
                    $aux = 'salida_' . $salida->id . '_';
                    $nombreFinal = $aux . $nombreOriginal;
                    $salida->comprobante->storeAs('public',$nombreFinal);
                    $file_url = '/storage/' . $nombreFinal;
                    $getSalida = Salida::find($salida->id);
                    $getSalida->comprobante = $file_url;
                    $getSalida->save();
                }else if($request->comprobante != null){
                    $nombreOriginal = $request->comprobante->getClientOriginalName();
                    $aux = 'salida_' . $getSalida->id . '_';
                    $nombreFinal = $aux . $nombreOriginal;
                    $request->comprobante->storeAs('public',$nombreFinal);
                    $file_url = '/storage/' . $nombreFinal;
                    $getSalida = Salida::find($getSalida->id);
                    $getSalida->comprobante = $file_url;
                    $getSalida->save();
                }
            }
        }
        if ($finanza->salidas_id != null) {
            request()->validate(Finanza::$rulesEgreso);
        }else{
            // Se evalua que no las fechas bno pasen de 3 dias antes de la fecha actual para tomarlo como retraso
            $fechaActual = Carbon::createFromFormat('Y-m-d', $request->fecha_entrada);
            $fechaLimite = Carbon::parse( Carbon::now()->subDay(3))->format('Y-m-d');
            $shippingDate = Carbon::createFromFormat('Y-m-d', $fechaLimite );
            $diferencia_en_dias = $fechaActual->diffInDays($shippingDate,false);
            // cuando es mayor a 1 es que la fecha es positiva antes de los 3 dias por lo que esta retrasado
            if($diferencia_en_dias > 0){
                $request['esta_atrasado'] = 1;
            }else{
                $request['esta_atrasado'] = 0;
            }

            request()->validate(Finanza::$rulesIngreso);
        }
        $finanza->update($request->all());
        // revisar si es a meses para poder cambiar los meses
        if(!is_null($finanza->a_meses)){
            $fechaLimite = Carbon::parse( $finanza->fecha_primer_pago);
            foreach($finanza->factura as $itemFactura){
                $itemFactura->mes_de_pago = $fechaLimite->format('Y-m-d');
                $itemFactura->save();
                $fechaLimite->addMonth();
            }
            
        }   
        

        return redirect()->route('finanzas.index')
            ->with('success', 'Finanza actualizada correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function editIngreso($id)
    {
        $finanza = Finanza::find($id);
        // si es entrada carga los siguiente        
        $entrada = Entrada::find($finanza->entradas_id);
        $datoscliente = Cliente::pluck('nombre','id');
        $esEntrada = True;
        
        $datosproyecto = Proyecto::pluck('nombre','id');
        $datostipodeingreso = TipoDeIngreso::pluck('nombre','id');
        $datosfamilia = Familia::pluck('nombre','id');
        $datoscategoriasfamilia = CategoriasFamilia::pluck('nombre','id');
        $datoscategoriasdeentrada = CategoriasDeEntrada::pluck('nombre','id');
        $datosunidad = Unidade::pluck('nombre','id');
        $datosiva = Iva::pluck('porcentaje','id');
        $datosfactura = Factura ::pluck('referencia_factura','id');

        return view('finanza.editIngreso', compact('finanza',$esEntrada ? 'entrada': 'salida',$esEntrada ? 'datoscliente':'datosproveedor','datosproyecto','datostipodeingreso','datosfamilia','datoscategoriasfamilia','datoscategoriasdeentrada','datosunidad','datosiva','datosfactura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function editEgresoMeses($id)
    {
        $finanza = Finanza::find($id);
        // si es entrada carga los siguiente        
        $esEntrada = false;
        $salida = Salida::find($finanza->salidas_id);
        $datosproveedor = Proveedore::pluck('nombre','id');

        $datosproyecto = Proyecto::pluck('nombre','id');
        $datostipodeingreso = TipoDeIngreso::pluck('nombre','id');
        $datosfamilia = Familia::pluck('nombre','id');
        $datoscategoriasfamilia = CategoriasFamilia::pluck('nombre','id');
        $datoscategoriasdeentrada = CategoriasDeEntrada::pluck('nombre','id');
        $datosunidad = Unidade::pluck('nombre','id');
        $datosiva = Iva::pluck('porcentaje','id');
        $datosfactura = Factura ::pluck('referencia_factura','id');
        return view('finanza.editEgresoMeses', compact('finanza',$esEntrada ? 'entrada': 'salida',$esEntrada ? 'datoscliente':'datosproveedor','datosproyecto','datostipodeingreso','datosfamilia','datoscategoriasfamilia','datoscategoriasdeentrada','datosunidad','datosiva','datosfactura'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function editEgreso($id)
    {
        $finanza = Finanza::find($id);
        // si es entrada carga los siguiente        
        $esEntrada = false;
        $salida = Salida::find($finanza->salidas_id);
        $datosproveedor = Proveedore::pluck('nombre','id');

        $datosproyecto = Proyecto::pluck('nombre','id');
        $datostipodeingreso = TipoDeIngreso::pluck('nombre','id');
        $datosfamilia = Familia::pluck('nombre','id');
        $datoscategoriasfamilia = CategoriasFamilia::pluck('nombre','id');
        $datoscategoriasdeentrada = CategoriasDeEntrada::pluck('nombre','id');
        $datosunidad = Unidade::pluck('nombre','id');
        $datosiva = Iva::pluck('porcentaje','id');
        $datosfactura = Factura ::pluck('referencia_factura','id');

        return view('finanza.editEgreso', compact('finanza',$esEntrada ? 'entrada': 'salida',$esEntrada ? 'datoscliente':'datosproveedor','datosproyecto','datostipodeingreso','datosfamilia','datoscategoriasfamilia','datoscategoriasdeentrada','datosunidad','datosiva','datosfactura'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $finanza_id = Finanza::find($id);
        if(isset($finanza_id->entradas_id ) ){
            Entrada::find($finanza_id->entradas_id)->delete();
        }else{
            $salida_id = Salida::find($finanza_id->salidas_id);
            if ($salida_id->comprobante != null) {
                unlink(base_path('storage/app/public/'.explode("/",$salida_id->comprobante)[2]));
            } 
            $salida_id->delete();
        }
        $factura = Factura::where('finanza_id','=',$finanza_id->id)->get();
        foreach($factura as $iterFacturas){
            if ($iterFacturas->factura_base64!= null) {
                unlink(base_path('storage/app/public/'.explode("/",$iterFacturas->factura_base64)[2]));
            }
            $iterFacturas->delete();
        }       
        $finanza_id->delete();
        return redirect()->route('finanzas.index')
            ->with('success', 'Finanza eliminada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function confirmarPago($id)
    {
        $finanza = Finanza::find($id);
        
        if ($finanza->es_pagado == 0) {
            $finanza->es_pagado = 1;
            $finanza->save();
            return back()->with('success', 'Pago actualizado (PAGADO) exitosamente.');
        }else{
            $finanza->es_pagado = 0;
            $finanza->save();
            return back()->with('success', 'Pago actualizado (SIN PAGAR) exitosamente.');
        }

        
    }

    /**
     * Display a listing of the supplier.
     *
     * @return \Illuminate\Http\Response
     */
    public function filtros()
    {      
        $proyecto = Proyecto::pluck('nombre','id');
        $cliente = Cliente::pluck('nombre','id');
        $proveedor = Proveedore::pluck('nombre','id');
        return view('finanza.filtros', compact('proyecto','cliente','proveedor'));
    }
    public function datosfiltrados(Request $request)
    {      
        $desde=$request->desde;
        $hasta=$request->hasta;
        $proyecto_id=$request->proyecto_id;
        $tipo=$request->tipo;
        $cliente_id=$request->cliente_id;
        $proveedor_id=$request->proveedor_id;
        // casos de los filtros

        // Puras fechas vrevisar que oo demas se a nulo
        if( is_null($desde) == false  && is_null($proyecto_id) != false && is_null($tipo) != false){
            $finanzas = Finanza::whereBetween('fecha_entrada', [$desde, $hasta])->orderBy('id','desc')->paginate();     
            return view('finanza.showdatosfiltrados', compact('finanzas'));
        // fecha y proyecto
        }elseif(is_null($desde) == false && is_null($proyecto_id) == false && is_null($tipo) != false){
            $filtros = [
                ['proyecto_id','=',$proyecto_id]
            ];
            $finanzas = Finanza::where($filtros)->whereBetween('fecha_entrada', [$desde, $hasta])->orderBy('id','desc')->paginate();     
            return view('finanza.showdatosfiltrados', compact('finanzas'));
        // fecha, proyecto y tipo
        }elseif(is_null($proyecto_id) == false && is_null($proyecto_id) == false && is_null($tipo) == false && is_null($cliente_id) != false && is_null($proveedor_id) != false){
            // si tipo = 0 es intgreso
            if($tipo == 0){
                $filtros = [
                    ['entradas_id','!=',null],
                    ['proyecto_id','=',$proyecto_id]
                ];
                $finanzas = Finanza::where($filtros)->whereBetween('fecha_entrada', [$desde, $hasta])->orderBy('id','desc')->paginate();     
                return view('finanza.showdatosfiltrados', compact('finanzas'));
            }else{
                $filtros = [
                    ['salidas_id','!=',null],
                    ['proyecto_id','=',$proyecto_id]
                ];
                $finanzas = Finanza::where($filtros)->whereBetween('fecha_entrada', [$desde, $hasta])->orderBy('id','desc')->paginate();     
                return view('finanza.showdatosfiltrados', compact('finanzas'));
            }
        }elseif(is_null($proyecto_id) == false && is_null($proyecto_id) == false && is_null($tipo) == false && (is_null($cliente_id) == false || is_null($proveedor_id) == false)){
            if($tipo == 0){
                $cliente_id=$request->cliente_id;
                $filtro1 = [
                    ['finanzas.entradas_id','!=',null],
                    ['finanzas.proyecto_id','=',$proyecto_id],
                    ['entradas.cliente_id','=',$cliente_id]
                ];
                $finanzas = Finanza::where($filtro1)->whereBetween('finanzas.fecha_entrada', [$desde, $hasta])->join('entradas', 'entradas.id', '=', 'finanzas.entradas_id')->orderBy('id','desc')->paginate();   

                return view('finanza.showdatosfiltrados', compact('finanzas'));
            }else{
                $proveedor_id=$request->proveedor_id;
                $filtros = [
                    ['finanzas.salidas_id','!=',null],
                    ['finanzas.proyecto_id','=',$proyecto_id],
                    ['salidas.proveedor_id','=',$proveedor_id]
                ];
                $finanzas = Finanza::where($filtros)->whereBetween('finanzas.fecha_entrada', [$desde, $hasta])->join('salidas', 'salidas.id', '=', 'finanzas.salidas_id')->orderBy('id','desc')->paginate();     
                return view('finanza.showdatosfiltrados', compact('finanzas'));
            }
        }
    }
}
