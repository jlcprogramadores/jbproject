@extends('adminlte::page')

@section('title','Editar Mina')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Mina</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('minas.update', $mina->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('mina.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
