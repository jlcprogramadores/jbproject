@extends('adminlte::page')

@section('title','Crear Gasolinera')



@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Gasolinera</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('gasolineras.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('gasolinera.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection