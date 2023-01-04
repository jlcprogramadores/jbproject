@extends('layouts.app')

@section('title','Mostrar Candidato')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Candidato</span>
                        </div>
                        <div class="float-right">
                            
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $candidato->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Género:</strong>
                            @if($candidato->genero  == 0 )
                                <span>Masculino</span>
                            @elseif ($candidato->genero  == 1 )
                                <span>Femenino</span>
                            @else
                                <span>Otro</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>Teléfono Personal:</strong>
                            {{ $candidato->telefono_personal }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $candidato->correo }}
                        </div>
                        <div class="form-group">
                            <strong>Currículum:</strong>
                            <td><a href="{{$candidato->curriculum}}">Link Currículum</a></td> 
                        </div>
                        <br>
                        <a class="btn btn-primary" href="{{ route('candidatos.index') }}"> Atrás</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
