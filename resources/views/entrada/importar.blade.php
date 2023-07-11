@extends('adminlte::page')
@section('title','importar')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Importar</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('entradas.exel') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            {{-- inicio form --}}
                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-group">
                                                {{ Form::label('file') }}
                                                <input type="file" name="file" >
                                            </div>
                                            
                                        </div>
                                        <br>
                                        <div class="row d-flex justify-content-center">
                                            <a href="{{ route('minas.index') }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
                                            <div class="col col-sm-2"></div>
                                            <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @push('scripts')
                                <script>
                                    function mayus(e) {
                                        e.value = e.value.toUpperCase();
                                    }
                                </script>
                            @endpush
                            {{-- fin form --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
