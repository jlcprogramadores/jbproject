@extends('adminlte::page')
@section('title','Documentos Candidato')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Documentos del Candidato: '.$Candidato->nombre ) }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('candidatos.index') }}" class="btn btn-light btn-sm float-right"  data-placement="left">
                                    {{ __('Atrás') }}
                                </a>
                                <a href="{{ route('documentos-candidatos.create',['id' => $Candidato->id, 'nombre' => $Candidato->nombre ]) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Añadir Documetos') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Archivo</th>
										<th>Usuario Edito</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documentosCandidatos as $documentosCandidato)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>
                                                <a href="{{$documentosCandidato->archivo}}">{{substr($documentosCandidato->archivo,9)}}</a> 
                                            </td>
                                            
                                            <td><span class="peque">{{ $documentosCandidato->usuario_edito }}</span>  <br/> <span class="peque">{{ $documentosCandidato->updated_at }}</span></td>

                                            <td>
                                                <form action="{{ route('documentos-candidatos.destroy',$documentosCandidato->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $documentosCandidatos->links() !!}
            </div>
        </div>
    </div>
@endsection