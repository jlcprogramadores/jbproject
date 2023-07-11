@extends('adminlte::page')

@section('title','Actualizar IVA')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar IVA</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ivas.update', $iva->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('iva.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection