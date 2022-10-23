@extends('layouts.app')

@section('title','Actualizar Telefono')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Telefono</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('telefonos.update', $telefono->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('telefono.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
