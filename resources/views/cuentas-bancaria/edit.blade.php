@extends('adminlte::page')

@section('title','Actualizar Cuenta Bancaria')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Cuenta Bancaria</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cuentas-bancarias.update', $cuentasBancaria->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('cuentas-bancaria.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection