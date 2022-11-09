@extends('layouts.app')

@section('title','Crear Egreso')
@if(\Auth::check())
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Egreso</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('finanzas.storeEgreso') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('finanza.formEgreso')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif