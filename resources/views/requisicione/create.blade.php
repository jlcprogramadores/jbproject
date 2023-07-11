@extends('adminlte::page')

@section('title','Crear Requisición')


    @section('content')
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @includeif('partials.errors')

                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">Crear Requisición</span>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('requisiciones.store') }}"  role="form" enctype="multipart/form-data">
                                @csrf

                                @include('requisicione.form')

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection