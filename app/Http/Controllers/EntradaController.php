<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Salida;
use App\Models\Finanza;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\TipoDeIngreso;
use App\Models\CategoriasDeEntrada;
use App\Models\Proyecto;
use App\Models\Proveedore;
use App\Models\Familia;
use App\Models\CategoriasFamilia;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Factura;
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
    
    
    public function importar()
    {
        return view('entrada.importar');
    }
    public function excel(Request $request)
    {
        // datos de la cabecera del archivo
        $no= "NO.";
        $fechaEntrada= "FECHA ENTRADA"; 
        $fechaSalida= "FECHA SALIDA"; 
        $vence= "VENCE"; 
        $fechaVencimiento= "FECHA VENCIMIENTO"; 
        $dias= "DIAS "; 
        $estado= "ESTADO"; 
        $tipoEyS= "TIPO E&S"; 
        $familia= "FAMILIA"; 
        $categoria= "CATEGORIA"; 
        $razon= "RAZON SOCIAL"; 
        $proyecto= "PROYECTO  "; 
        $descripcion= "DESCRIPCION"; 
        $factura= "FACTURA  O FOLIO";
        $proveedor= "PROVEEDOR ";
        $cantidad= "CANTIDAD"; 
        $unidad= "UNIDAD"; 
        $costoUnitario= "COSTO UNITARIO"; 
        $subTotal= "SUBTOTAL TOTAL MXN"; 
        $iva= "IVA"; 
        $total= "TOTAL       \$MXN$"; 
        $monto= "MONTO A PAGAR";
        $fechaDePago= "FECHA DE PAGO"; 
        $metodoDePago= "METODO DE PAGO"; 
        $estatus= "$ ESTATUS $"; 
        $entregadoA= "ENTREGADO MATERIAL A "; 
        $comentarios= "COMENTARIOS";
        $usuario_edito = 'sistema';
        // Inicializar datos 
        $dt = Carbon::now(); // fecha actual
        $dateNow = $dt->toDateTimeString(); // formato correcto de fecha actual
        $path = $request->file('file')->getRealPath();
        $collection = (new FastExcel)->import($path); //colección de datos
        $iteradorProyecto = 2;

        foreach($collection as $file){
            // se limpian los espacios
            foreach ($file as $key => $val) {
                if(is_string($val)){
                    $trimVal = trim($val);
                    $file[$key] = $trimVal != "-"  ? $trimVal : 0 ;
                }
            }
            
            
            // print_r($file[$proveedor].'/');
            $entrada_salida_id = 0;
            $es_salida = $file[$tipoEyS] == "SALIDA";
            if($es_salida){ // salida
                // Busca proyecto y si no existe lo crea
                $get_proyecto = DB::table('proyectos')->where('nombre',DB::raw("'".$file[$proyecto]."'"))->get()->first();
                if(!$get_proyecto){
                    $iteradorProyecto ++;
                    $datos_proyecto = [            
                        'nombre' => $file[$proyecto],
                        'descripcion' => $file[$proyecto],
                        'numero_de_proyecto' => $iteradorProyecto,
                        'es_activo' => 1,
                        'usuario_edito' => 'Administrador',
                        'presupuesto' => 1,
                        'margen' => 2,
                        'created_at' => $dateNow,
                        'updated_at' => $dateNow
                    ];
                    $get_proyecto = Proyecto::create($datos_proyecto);
                }

                // Busca proveedor y si no existe lo crea
                $get_proveedor = DB::table('proveedores')->where('nombre',DB::raw("'".$file[$proveedor]."'"))->get()->first();
                if(!$get_proveedor){
                    $datos_proveedor = [            
                        'nombre' => $file[$proveedor],
                        'razon_social' => $file[$proveedor],
                        'estado' => 'SIN ESTADO',
                        'dias_de_credito' => 0,
                        'monto_de_credito' => 0,
                        'es_facturable' => 0,
                        'mail' => 'SIN CORREO',
                        'rfc' => 'SIN RFC',
                        'es_activo' => 1,
                        'usuario_edito' => 'Administrador',
                        'created_at' => $dateNow,
                        'updated_at' => $dateNow
                    ];
                    $get_proveedor = Proveedore::create($datos_proveedor);  
                }

                $datos_salida =[
                    'proveedor_id' => $get_proveedor->id,
                    'usuario_edito' => $usuario_edito,
                    'enviado' => 0,
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow,
                ];
                $get_salida = Salida::create($datos_salida);
                $entrada_salida_id = $get_salida->id;

                

            }else{ //entrada
                // Busca cliente y si no existe lo crea
                $get_cliente = DB::table('clientes')->where('nombre',DB::raw("'".$file[$proveedor]."'"))->get()->first();
                if(!$get_cliente){
                    $datos_cliente = [          
                        'nombre' => $file[$proveedor],
                        'razon_social' => $file[$proveedor],
                        'mail' => 'SIN CORREO',
                        'rfc' => 'SIN RFC',
                        'es_activo' => 1,
                        'usuario_edito' => 'Administrador',
                        'created_at' => $dateNow,
                        'updated_at' => $dateNow
                    ];
                    $get_cliente = Cliente::create($datos_cliente);
                }

                // Busca cliente y si no existe lo crea
                $get_proyecto = DB::table('proyectos')->where('nombre',DB::raw("'".$file[$proyecto]."'"))->get()->first();
                if(!$get_proyecto){
                    $iteradorProyecto ++;
                    $datos_proyecto_2 = [            
                        'nombre' => $file[$proyecto],
                        'descripcion' => $file[$proyecto],
                        'numero_de_proyecto' => $iteradorProyecto,
                        'es_activo' => 1,
                        'usuario_edito' => 'Administrador',
                        'presupuesto' => 1,
                        'margen' => 2,
                        'created_at' => $dateNow,
                        'updated_at' => $dateNow
                    ];
                    $get_proyecto = Proyecto::create($datos_proyecto_2);   
                }
                
                $datos_entrada =[
                    'cliente_id' => isset($get_cliente->id) ? $get_cliente->id : null,
                    'tipodeingreso_id' => 1,
                    'categorias_de_entrada_id' => 1,
                    'proyecto_id' => isset($get_proyecto->id) ? $get_proyecto->id : 1,
                    'usuario_edito' => $usuario_edito,
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow,
                ];

                $entrada = Entrada::create($datos_entrada);
                $entrada_salida_id = $entrada->id;
            }
            $get_familia = [];
            $get_categoria = [];
            $datos_familia = [];
            $datos_categoria = [];
            $get_familia = DB::table('familias')->where('nombre',DB::raw("'".$file[$familia]."'"))->get()->first();
            if(!$get_familia){
                $datos_familia = [            
                    'nombre' => $file[$familia],
                    'descripcion' => '',
                    'es_activo' => 1,
                    'usuario_edito' => 'Administrador',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ];
                $get_familia = Familia::create($datos_familia);   
            } 
            $get_categoria = DB::table('categorias_familias')->where('nombre',DB::raw("'".$file[$categoria]."'"))->get()->first();
            if(!$get_categoria){
                $datos_categoria = [           
                    'familia_id' => $get_familia->id,
                    'nombre' => $file[$categoria],
                    'descripcion' => '',
                    'es_activo' => 1,
                    'usuario_edito' => 'Administrador',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ];
                $get_categoria = CategoriasFamilia::create($datos_categoria);   
            } 

            $get_proyecto = $file[$proyecto] != ''?  DB::table('proyectos')->where('nombre',DB::raw("'".$file[$proyecto]."'"))->get()->first() : 1;

            $dbIva = DB::table('ivas')->where('porcentaje',DB::raw("'".$file[$iva]."'"))->get()->first();

            $dbUnidades = DB::table('unidades')->where('nombre',DB::raw("'".$file[$unidad]."'"))->get()->first();

            // dd($file[$fechaEntrada] ? Carbon::parse($file[$fechaEntrada])->format('Y-m-d') : null);
            // dd($file);
            $datosFinanza = [ // 2978
                'salidas_id' => $es_salida ? $entrada_salida_id : null,
                'entradas_id' => $es_salida ? null : $entrada_salida_id,
                'categoria_id' => isset($get_categoria->id) ? $get_categoria->id : null,
                'vence' => $file[$vence] != "" ? $file[$vence] : 0 ,
                'proyecto_id' => isset($get_proyecto->id) ? $get_proyecto->id : 1,
                'iva_id' => $dbIva->id,
                'no' => $file[$no]? $file[$no] : 999999,
                'fecha_facturacion' => $es_salida ? null : ($file[$fechaSalida] ? Carbon::parse($file[$fechaSalida])->format('Y-m-d') : null),
                'fecha_salida' => $es_salida ? $file[$fechaSalida] ? Carbon::parse($file[$fechaSalida])->format('Y-m-d') : null : null,
                'fecha_entrada' => $file[$fechaEntrada] ? Carbon::parse($file[$fechaEntrada])->format('Y-m-d') : null,
                'descripcion' =>$file[$descripcion],
                'cantidad' => $file[$cantidad],
                'unidad_id' => isset($dbUnidades->id) ? $dbUnidades->id : 1,
                'costo_unitario' => $file[$costoUnitario] != "" ? $file[$costoUnitario] : 0,
                'monto_a_pagar' => $file[$monto] != "" ? $file[$monto] : 0 ,
                'fecha_de_pago' => $file[$fechaDePago] != "" ? Carbon::parse($file[$fechaDePago])->format('Y-m-d') : $dateNow,
                'metodo_de_pago' => $file[$metodoDePago] ,
                'entregado_material_a' => $file[$entregadoA],
                'comentario' => $file[$comentarios],
                // 'a_meses' => ,
                // 'fecha_primer_pago' => ,
                'usuario_edito' => $usuario_edito,
                'es_pagado' => $file[$monto] != "" ? 1 : 0,  
                'esta_atrasado' => 0,
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ];

            $finanza = Finanza::create($datosFinanza);
            // dump();
            if( $file["FACTURA  O FOLIO"] != ""){
                $facturas =$file["FACTURA  O FOLIO"] != "SIN/OCJB"? explode("/",$file["FACTURA  O FOLIO"]) : explode("/","SIN OCJB");
                foreach($facturas as $item){
                    $datosFactura = [
                        'finanza_id' => $finanza->id,
                        'referencia_factura' => trim($item),
                        'fecha_creacion' => $dateNow,
                        'usuario_edito' => $usuario_edito,
                        'created_at' => $dateNow,
                        'updated_at' => $dateNow,
                    ];
                    $factura = Factura::create($datosFactura);
                }
            }
            
            // creacion de finanza
            print_r(' / '.$file[$no].' / ');
        }
       return print_r('| Termine |');

    }



}
