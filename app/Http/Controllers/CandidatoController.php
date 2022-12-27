<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;

/**
 * Class CandidatoController
 * @package App\Http\Controllers
 */
class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidatos = Candidato::paginate();

        return view('candidato.index', compact('candidatos'))
            ->with('i', (request()->input('page', 1) - 1) * $candidatos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $candidato = new Candidato();
        return view('candidato.create', compact('candidato'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Candidato::$rules);

        $candidato = Candidato::create($request->all());
        if ($candidato->curriculum != null) {
            $nombreOriginal = $candidato->curriculum->getClientOriginalName();
            $aux = 'candidato_' . $candidato->id . '_';
            $nombreFinal = $aux . $nombreOriginal;
            $candidato->curriculum->storeAs('public',$nombreFinal);
            $file_url = '/storage/' . $nombreFinal;
            $getCandidato = Candidato::find($candidato->id);
            $getCandidato->curriculum = $file_url;
            $getCandidato->save();
        }

        return redirect()->route('candidatos.index')
            ->with('success', 'Candidato creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidato = Candidato::find($id);

        return view('candidato.show', compact('candidato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidato = Candidato::find($id);

        return view('candidato.edit', compact('candidato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Candidato $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {

        if ($request->curriculum != null) {
            if ($candidato->curriculum != null) {
                //Existe un factura_base64 anterior
                request()->validate(Candidato::$rules);
                unlink(base_path('storage/app/public/'.explode("/",$candidato->curriculum)[2]));
                $nombreOriginal = $request->curriculum->getClientOriginalName();
                $aux = 'candidato_' . $candidato->id . '_';
                $nombreFinal = $aux . $nombreOriginal;
                $request->curriculum->storeAs('public',$nombreFinal);
                $file_url = '/storage/' . $nombreFinal;
                $candidato->update($request->all());
                $candidato->curriculum = $file_url;
                $candidato->save();
            }else{
                request()->validate(Candidato::$rules);
                $nombreOriginal = $request->curriculum->getClientOriginalName();
                $aux = 'candidato_' . $candidato->id . '_';
                $nombreFinal = $aux . $nombreOriginal;
                $request->curriculum->storeAs('public',$nombreFinal);
                $file_url = '/storage/' . $nombreFinal;
                $candidato->update($request->all());
                $candidato->curriculum = $file_url;
                $candidato->save();
            }
        }else{
            request()->validate(Candidato::$rules);
            $candidato->update($request->all());
        }

        return redirect()->route('candidatos.index')
            ->with('success', 'Candidato actualizado correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {        
        $candidato = Candidato::find($id);
        if ($candidato->curriculum != null) {
            unlink(base_path('storage/app/public/'.explode("/",$candidato->curriculum)[2]));
        } 
        $candidato = Candidato::find($id)->delete();

        return redirect()->route('candidatos.index')
            ->with('success', 'Candidato eliminado exitosamente.');
    }
}
