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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexEgreso()
    {
        $finanzas = Finanza::where('salidas_id','!=',null)->paginate();     

        return view('finanza.indexEgreso', compact('finanzas'))
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

        return view('finanza.indexIngreso', compact('finanzas'))
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
    public function topIngreso()
    {   
        $finanzas = Finanza::where('entradas_id','!=',null)->orderBy('monto_a_pagar', 'desc')->limit(10)->paginate();
        
        return view('finanza.topIngreso', compact('finanzas'))
            ->with('i', (request()->input('page', 1) - 1) * $finanzas->perPage());
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function topEgreso()
    {
        $finanzas = Finanza::where('salidas_id','!=',null)->orderBy('monto_a_pagar', 'desc')->limit(10)->paginate();     

        return view('finanza.topEgreso', compact('finanzas'))
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
        // se crea la entrada se recupera el id y se anade al request
        $entrada = Entrada::create($request->all());
        $request->request->add(['entradas_id' => $entrada->id]);
        $finanza = Finanza::create($request->all());

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
        //Hasta aqui se añaden los archivos en base64
        $request->request->add(['salidas_id' => $salida->id]);
        $finanza = Finanza::create($request->all());

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
        $salida = Salida::find($finanza->salidas_id);
        return view('finanza.show', compact('finanza','salida'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function showTopEgreso($id)
    {
        $finanza = Finanza::find($id);
        $salida = Salida::find($finanza->salidas_id);
        return view('finanza.showTopEgreso', compact('finanza','salida'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function showTopIngreso($id)
    {
        $finanza = Finanza::find($id);
        $salida = Salida::find($finanza->salidas_id);
        return view('finanza.showTopIngreso', compact('finanza','salida'));
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

        $data = [
            'comprobante' => 'https://mttojbindustrial.com/'.$comprobante,
            'monto_a_pagar' => $cantidad,
        ];

        $correo = new ComprobanteMailable($data);
        Mail::to($email)->send($correo,$data);
        $salida->enviado = 1;
        $salida->save();
        return redirect()->route('finanzas.index')
            ->with('success', 'Correo enviado exitosamente.');
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
        if ($finanza->salidas_id != null) {
            $salida = Salida::find($finanza->salidas_id);
            $getSalida = Salida::find($salida->id);
            if ($getSalida->comprobante != null) {
                //Existe un comprobante anterior
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
        // si tienes entrada borra tambien entrada y si tienes salida tambien la salida
        $entradaId=Finanza::find($id)->entradas_id;
        if(isset($entradaId)){
            Entrada::find($entradaId)->delete();
        }else{
            $salidaId =Finanza::find($id)->salidas_id;
            $getSalida = Salida::find($salidaId);
            if ($getSalida->comprobante != null) {
                unlink(base_path('storage\app\public\\'.explode("/",$getSalida->comprobante)[2])); 
            } 
            Salida::find($salidaId)->delete();
        }
        $finanza = Finanza::find($id)->delete();
        return redirect()->route('finanzas.index')
            ->with('success', 'Finanza eliminada exitosamente.');
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
        if($tipo != 1){
            $cliente_id=$request->cliente_id;
            $filtros = [
                ['entradas_id','!=',null],
                ['proyecto_id','=',$proyecto_id]
            ];
            $finanzas = Finanza::where($filtros)->whereBetween('created_at', [$desde, $hasta])->paginate();     
            return view('finanza.showdatosfiltrados', compact('finanzas'));
        }else{
            $proveedor_id=$request->proveedor_id;
            $finanzas = Finanza::where('salidas_id','!=',null)->paginate();     
            return view('finanza.showdatosfiltrados', compact('finanzas'));
        }
    }
}
