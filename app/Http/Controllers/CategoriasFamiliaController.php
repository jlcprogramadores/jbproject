<?php

namespace App\Http\Controllers;

use App\Models\CategoriasFamilia;
use App\Models\Familia;
use App\Models\Entrada;
use App\Models\Finanza;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector;

/**
 * Class CategoriasFamiliaController
 * @package App\Http\Controllers
 */
class CategoriasFamiliaController extends Controller
{   
    public function __construct()
    {
        $this->middleware('can:categorias-familias.index')->only(['index']);
        $this->middleware('can:categorias-familias.acciones')->only(['show', 'edit', 'update', 'destroy']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriasFamilias = CategoriasFamilia::paginate();
        return view('categorias-familias.index', compact('categoriasFamilias'))
            ->with('i', (request()->input('page', 1) - 1) * $categoriasFamilias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriasFamilia = new CategoriasFamilia();
        $familia = Familia::pluck('nombre','id');
        return view('categorias-familias.create', compact('categoriasFamilia','familia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CategoriasFamilia::$rules);

        $categoriasFamilia = CategoriasFamilia::create($request->all());

        return redirect()->route('categorias-familias.index')
            ->with('success', 'Categoria Familia creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoriasFamilia = CategoriasFamilia::find($id);

        return view('categorias-familias.show', compact('categoriasFamilia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriasFamilia = CategoriasFamilia::find($id);
        $familia = Familia::pluck('nombre','id');
        return view('categorias-familias.edit', compact('categoriasFamilia','familia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CategoriasFamilia $categoriasFamilia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriasFamilia $categoriasFamilia)
    {
        request()->validate(CategoriasFamilia::$rules);

        $categoriasFamilia->update($request->all());

        return redirect()->route('categorias-familias.index')
            ->with('success', 'Categoria Familia actualizada correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {   
        $categoriaFamiliaEntrada = Finanza::select('id')->where('categoria_id','=',$id)->first();
        if(!is_null($categoriaFamiliaEntrada)){
            return redirect()->route('categorias-familias.index')
                ->with('danger', 'No se elimino Categoria Familia por que existen finanzas relacionadas.');
        }else{
            $categoriasFamilia = CategoriasFamilia::find($id)->delete();
            return redirect()->route('categorias-familias.index')
                ->with('success', 'Categoria Familia eliminado exitosamente.');
        }
    }

    public function getCategoriByFamilia(Request $request)
    {
        $familia_id = $request->familia_id;
        $categorias = CategoriasFamilia::select('id','nombre')->where('familia_id','=',$familia_id)->get();
        return json_encode($categorias) ;
    }
    
}
