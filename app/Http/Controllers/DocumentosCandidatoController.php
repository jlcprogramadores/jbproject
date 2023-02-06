<?php

namespace App\Http\Controllers;

use App\Models\DocumentosCandidato;
use App\Models\Candidato;
use Illuminate\Http\Request;

/**
 * Class DocumentosCandidatoController
 * @package App\Http\Controllers
 */
class DocumentosCandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $id )
    {
        $documentosCandidatos = DocumentosCandidato::where('candidato_id',$id)->paginate();
        $Candidato = Candidato::find($id);
        return view('documentos-candidato.index', compact('documentosCandidatos','Candidato'))
            ->with('i', (request()->input('page', 1) - 1) * $documentosCandidatos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documentosCandidato = new DocumentosCandidato();
        return view('documentos-candidato.create', compact('documentosCandidato'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DocumentosCandidato::$rules);
        $candidato_id = $request->candidato_id;
        $usuario_edito = $request->usuario_edito;
        foreach($request->archivo as $item){
            $docCandidatos = [
                'candidato_id' => $candidato_id,
                'archivo' => $item,
                'usuario_edito' => $usuario_edito,
            ];
            $documentosCandidato = DocumentosCandidato::create($docCandidatos);
            if ($documentosCandidato->archivo != null) {
                $nombreOriginal = $documentosCandidato->archivo->getClientOriginalName();
                $aux = 'docEmp_' . $documentosCandidato->id . '_';
                $nombreFinal = $aux . $nombreOriginal;
                $documentosCandidato->archivo->storeAs('public',$nombreFinal);
                $file_url = '/storage/' . $nombreFinal;
                $getdocCandidato = DocumentosCandidato::find($documentosCandidato->id);
                $getdocCandidato->archivo = $file_url;
                $getdocCandidato->save();
            }
        }
        return redirect()->route('documentos-candidatos.doccandidato', $candidato_id)
            ->with('success', 'DocumentosCandidato created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documentosCandidato = DocumentosCandidato::find($id);

        return view('documentos-candidato.show', compact('documentosCandidato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documentosCandidato = DocumentosCandidato::find($id);

        return view('documentos-candidato.edit', compact('documentosCandidato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DocumentosCandidato $documentosCandidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocumentosCandidato $documentosCandidato)
    {
        request()->validate(DocumentosCandidato::$rules);

        $documentosCandidato->update($request->all());

        return redirect()->route('documentos-candidatos.index')
            ->with('success', 'DocumentosCandidato updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $documentosCandidato = DocumentosCandidato::find($id)->delete();

        return redirect()->route('documentos-candidatos.index')
            ->with('success', 'DocumentosCandidato deleted successfully');
    }
}
