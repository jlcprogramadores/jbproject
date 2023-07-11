@extends('adminlte::page')

@section('title','Crear IVA')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear IVA</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ivas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('iva.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection