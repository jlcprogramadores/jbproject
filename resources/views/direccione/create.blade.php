@extends('layouts.app')

@section('title','Crear Dirección')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')
                
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear dirección</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('direcciones.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('direccione.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
