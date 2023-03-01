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
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
        // datos de la cabezera del archivo
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
        // datos generales
        $usuario_edito = 'sistema';


        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        $path = $request->file('file')->getRealPath();
        $collection = (new FastExcel)->import($path);
        // dd($collection);



        foreach($collection as $file){            
            // creacion de entrada o salida
            $esSalida = $file[$tipoEyS] == "SALIDA";
            $idEntSal = 0;
            if($esSalida ){ //salida
                $dbProveedor = DB::table('proveedores')->where('nombre',DB::raw("'".$file[$proveedor]."'"))->get()->first();
                $datosSalida =[
                    'proveedor_id' => isset($dbProveedor->id)? $dbProveedor->id : null,
                    'usuario_edito' => $usuario_edito,
                    // 'comprobante' => ,
                    'enviado' => 0,
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow,
                ];
                // dd($datosSalida);
                $salida = Salida::create($datosSalida);
                $idEntSal = $salida->id;
            }else{ //entrada
                $dbCliente = DB::table('clientes')->where('nombre',DB::raw("'".$file[$proveedor]."'"))->get()->first();
                $dbProyecto = DB::table('proyectos')->where('nombre',DB::raw("'".$file[$proyecto]."'"))->get()->first();

                $datosEntrada =[
                    'cliente_id' => isset($dbCliente->id) ? $dbCliente->id : null,
                    'tipodeingreso_id' => 0,
                    'categorias_de_entrada_id' => 0,
                    'proyecto_id' => isset($dbProyecto->id) ? $dbProyecto->id : null,
                    'usuario_edito' => $usuario_edito,
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow,
                ];
                // dd($datosEntrada);
                $entrada = Entrada::create($datosEntrada);
                $idEntSal = $entrada->id;
            }

            $dbCategoria = DB::table('categorias_familias','cf')
                ->leftjoin(DB::raw('familias as f'), 'f.id', '=', 'cf.familia_id')
                ->select('cf.id')
                ->where('f.nombre',DB::raw("'".$file[$familia]."'"))
                ->where('cf.nombre',DB::raw("'".$file[$categoria]."'"))
                ->get()
                ->first();
            $dbProyecto = DB::table('proyectos')->where('nombre',DB::raw("'".$file[$proyecto]."'"))->get()->first();

            $dbIva = DB::table('ivas')->where('porcentaje',DB::raw("'".$file[$iva]."'"))->get()->first();

            $dbUnidades = DB::table('unidades')->where('nombre',DB::raw("'".$file[$unidad]."'"))->get()->first();

            // dd($file[$fechaEntrada] ? Carbon::parse($file[$fechaEntrada])->format('Y-m-d') : null);
            $datosFinanza = [
                'salidas_id' => $esSalida ? $idEntSal : null,
                'entradas_id' => $esSalida ? null : $idEntSal,
                'categoria_id' => isset($dbCategoria->id) ? $dbCategoria->id : null,
                'vence' => $file[$vence],
                'proyecto_id' => isset($dbProyecto->id) ? $dbProyecto->id : null,
                'iva_id' => $dbIva->id,
                'no' => $file[$no],
                'fecha_facturacion' => $esSalida ? null : ($file[$fechaSalida] ? Carbon::parse($file[$fechaSalida])->format('Y-m-d') : null),
                'fecha_salida' => $esSalida ? $file[$fechaSalida] ? Carbon::parse($file[$fechaSalida])->format('Y-m-d') : null : null,
                'fecha_entrada' => $file[$fechaEntrada] ? Carbon::parse($file[$fechaEntrada])->format('Y-m-d') : null,
                'descripcion' =>$file[$descripcion],
                'cantidad' => $file[$cantidad],
                'unidad_id' => $dbUnidades->id,
                'costo_unitario' => $file[$costoUnitario],
                'monto_a_pagar' => $file[$monto],
                'fecha_de_pago' => $file[$fechaDePago] ? Carbon::parse($file[$fechaDePago])->format('Y-m-d') : null,
                'metodo_de_pago' => $file[$metodoDePago],
                'entregado_material_a' => $file[$entregadoA],
                'comentario' => $file[$comentarios],
                // 'a_meses' => ,
                // 'fecha_primer_pago' => ,
                'usuario_edito' => $usuario_edito,
                'es_pagado' => 0,  
                'esta_atrasado' => 0,
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ];

            dd($datosFinanza);
            $finanza = Finanza::create($datosFinanza);




            // creacion de finanza
        }
        dd();

    }



}
