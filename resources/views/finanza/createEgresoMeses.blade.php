@extends('adminlte::page')

@section('title','Crear Egreso A Meses')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Egreso A Meses</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('finanzas.storeEgresoMeses') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('finanza.formEgresoMeses')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection