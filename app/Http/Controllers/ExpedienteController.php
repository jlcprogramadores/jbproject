<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/**
 * Class ExpedienteController
 * @package App\Http\Controllers
 */
class ExpedienteController extends Controller
{   
    public function __construct()
    {
        $this->middleware('can:expedientes.index')->only(['index']);
        $this->middleware('can:expedientes.acciones')->only(['show', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // capacitaciones_dc3 no debe de ver
        $id_dc3 = DB::table('expedientes')
            ->where('nombre','=','capacitaciones_dc3')
            ->get();
        $id_dc3  = $id_dc3->first()->id;
        // cartas_amonestacion no debe de ver
        $id_cartas_amo = DB::table('expedientes')
            ->where('nombre','=','cartas_amonestacion')
            ->get();
        $id_cartas_amo  = $id_cartas_amo->first()->id;

        $expedientes = Expediente::where('expedientes.id','!=',DB::raw($id_dc3))->where('expedientes.id','!=',DB::raw($id_cartas_amo))->paginate();
        
        return view('expediente.index', compact('expedientes'))
            ->with('i', (request()->input('page', 1) - 1) * $expedientes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expediente = new Expediente();
        return view('expediente.create', compact('expediente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Expediente::$rules);

        $expediente = Expediente::create($request->all());

        return redirect()->route('expedientes.index')
            ->with('success', 'Expediente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expediente = Expediente::find($id);

        return view('expediente.show', compact('expediente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $expediente = Expediente::find($id);


        return view('expediente.edit', compact('expediente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Expediente $expediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expediente $expediente)
    {
        request()->validate(Expediente::$rules);

        $expediente->update($request->all());

        return redirect()->route('expedientes.index')
            ->with('success', 'Expediente actualizado correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {   
        dd($id);
        // $expediente = Expediente::find($id)->delete();

        // return redirect()->route('expedientes.index')
        //     ->with('success', 'Expediente eliminado exitosamente.');
    }
}
