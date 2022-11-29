@extends('layouts.app')
@section('title', 'Finanzas')
@if (Auth::check() && Auth::user()->es_activo)
    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card text-white border-secondary">
                        <div class="card-header bg-secondary">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span id="card_title">
                                    {{ __('Filtros') }}
                                </span>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="card-body">
                            <form method="POST" action="{{ route('finanzas.datosfiltrados') }}" role="form" enctype="multipart/form-data">
                            @csrf
                                <div class="container">
                                    <div class="form-group">
                                        <label for="desde">Desde:</label>
                                        <br>
                                        <input type="date" name="desde" id="desde">
                                    </div>
                                    <div class="form-group">
                                        
                                        <label for="hasta">Hasta:</label>
                                        <br>
                                        <input type="date" name="hasta" id="hasta">
                                    </div>
                                    <div class="form-group">
                                        <label class="proyecto_id" name="Ingreso_id" for="Ingreso_id">Proyecto:</label>
                                        <br>
                                        <select class="form-control" id="proyecto_id" name="proyecto_id">
                                            <option selected="selected">Selecciona Proyecto</option>
                                            @foreach($proyecto as $val => $name)
                                                <option value = "{{ $val }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipo">Tipo finanza</label>
                                        <br>
                                        <select class="form-control" id="tipo" name="tipo">
                                            <option selected="selected">Selecciona el tipo</option>
                                            <option value="0">Ingreso</option>
                                            <option value="1">Egreso</option>
                                        </select>
                                    </div>
        
                                    <div class="form-group" id="cliente" style="display: none">
                                        <label for="Cliente_id">Cliente</label>
                                        <br>
                                        <select class="form-control" id="cliente_id" name="cliente_id">
                                            <option selected="selected">Selecciona Proyecto</option>
                                            @foreach($cliente as $val => $name)
                                                <option value = "{{ $val }}">{{  $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" id="proveedor" style="display: none">
                                        <label for="Proveedor_id">Proveedor</label>
                                        <br>
                                        <select class="form-control" id="proveedor_id" name="proveedor_id">
                                            <option selected="selected">Selecciona Proyecto</option>
                                            @foreach($proveedor as $val => $name)
                                                <option value = "{{ $val }}">{{  $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                    <div class="container">
                                        <div class="row justify-content-md-center">
                                            <button type="submit" class="btn btn-primary col col-lg-3">Aceptar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('#proyecto_id').select2();
    $('#tipo').select2();
    $('#Cliente_id').select2();
    $('#Proveedor_id').select2();
    $('#tipo').on('select2:select', function (e) {
        var data = e.params.data;
        console.log(data.id);
        if(data.id != 1){ // es ingreso
            document.getElementById("cliente").style.display = "block";
            document.getElementById("proveedor").style.display = "none";
        }else{ // es egreso
            document.getElementById("proveedor").style.display = "block";
            document.getElementById("cliente").style.display = "none";
        }
    });

    
</script>
@endpush