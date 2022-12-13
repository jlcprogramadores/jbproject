@extends('layouts.app')

@section('title','Actualizar Usuario')
@if(Auth::check() && Auth::user()->es_activo)
    @section('content')
        <section class="content container-fluid">
            <div class="">
                <div class="col-md-12">

                    @includeif('partials.errors')

                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">Actualizar Usuario</span>
                        </div>
                        <div class="card-body">
                            
                            {!! Form::model ($user, ['route' => ['usuarios.update',$user->id], 'method'=>'PUT']) !!}
                                @include('user.form')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
@endif