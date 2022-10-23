<?php

namespace App\Http\Controllers;

use App\Models\CategoriasDeEntrada;
use Illuminate\Http\Request;

/**
 * Class CategoriasDeEntradaController
 * @package App\Http\Controllers
 */
class CategoriasDeEntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriasDeEntradas = CategoriasDeEntrada::paginate();

        return view('categorias-de-entrada.index', compact('categoriasDeEntradas'))
            ->with('i', (request()->input('page', 1) - 1) * $categoriasDeEntradas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriasDeEntrada = new CategoriasDeEntrada();
        return view('categorias-de-entrada.create', compact('categoriasDeEntrada'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CategoriasDeEntrada::$rules);

        $categoriasDeEntrada = CategoriasDeEntrada::create($request->all());

        return redirect()->route('categorias-de-entradas.index')
            ->with('success', 'Categoria de Entrada creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoriasDeEntrada = CategoriasDeEntrada::find($id);

        return view('categorias-de-entrada.show', compact('categoriasDeEntrada'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriasDeEntrada = CategoriasDeEntrada::find($id);

        return view('categorias-de-entrada.edit', compact('categoriasDeEntrada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CategoriasDeEntrada $categoriasDeEntrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriasDeEntrada $categoriasDeEntrada)
    {
        request()->validate(CategoriasDeEntrada::$rules);

        $categoriasDeEntrada->update($request->all());

        return redirect()->route('categorias-de-entradas.index')
            ->with('success', 'Categoria de Entrada actualizada correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $categoriasDeEntrada = CategoriasDeEntrada::find($id)->delete();

        return redirect()->route('categorias-de-entradas.index')
            ->with('success', 'Categoria de Entrada eliminada exitosamente.');
    }
}
