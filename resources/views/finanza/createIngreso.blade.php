@extends('layouts.app')

@section('title','Crear Ingreso')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Ingreso</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('finanzas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('finanza.formIngreso')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
