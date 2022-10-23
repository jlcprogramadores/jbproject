@extends('layouts.app')

@section('template_title')
    Update Tipo De Ingreso
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Tipo De Ingreso</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tipo-de-ingresos.update', $tipoDeIngreso->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tipo-de-ingreso.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
