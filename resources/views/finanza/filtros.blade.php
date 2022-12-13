@extends('layouts.app')

@section('title','Filtros')
@if(Auth::check() && Auth::user()->es_activo)
@can('finanzas.filtros')
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Filtros</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('finanzas.datosfiltrados') }}" role="form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="box box-info padding-1">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm p-1 form-group">
                                                <label for="desde">Inico fecha de entrada:</label>
                                                <br>
                                                <input id="desde" type="date" name="desde" onchange="funcionDesde(this.value)" required>
                                            </div>
                                            <div class="col-sm p-1 form-group">

                                                <label for="hasta">Fin fecha de entrada:</label>
                                                <br>
                                                <input type="date" name="hasta" id="hasta" onchange="funcionHasta(this.value)" required>
                                            </div>

                                            <div class="col-sm p-1 form-group">
                                                <label class="proyecto_id" name="Ingreso_id"
                                                    for="Ingreso_id">Proyecto:</label>
                                                <br>
                                                <select class="form-control" id="proyecto_id" name="proyecto_id">
                                                    <option value="" selected="selected">Selecciona Proyecto</option>
                                                    @foreach ($proyecto as $val => $name)
                                                        <option value="{{ $val }}">{{ $name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm p-1 form-group">
                                                <label for="tipo">Tipo Finanza:</label>
                                                <br>
                                                <select class="form-control" id="tipo" name="tipo">
                                                    <option value="" selected="selected">Selecciona el tipo</option>
                                                    <option value="0">Ingreso</option>
                                                    <option value="1">Egreso</option>
                                                </select>
                                            </div>

                                            <div class="col-sm p-1 form-group" id="cliente" style="display: none">
                                                <label for="cliente_id">Cliente:</label>
                                                <br>
                                                <select class="form-control" id="cliente_id" name="cliente_id">
                                                    <option value="" selected="selected">Selecciona Proyecto</option>
                                                    @foreach ($cliente as $val => $name)
                                                        <option value="{{ $val }}">{{ $name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm p-1 form-group" id="proveedor" style="display: none">
                                                <label for="proveedor_id">Proveedor:</label>
                                                <br>
                                                <select class="form-control" id="proveedor_id" name="proveedor_id">
                                                    <option value="" selected="selected">Selecciona Proyecto</option>
                                                    @foreach ($proveedor as $val => $name)
                                                        <option value="{{ $val }}">{{ $name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                        </div>
                                        <br />
                                        <div class="container">
                                            <span id="advertencia" style="color: red" > La fecha Desde debe ser menor a la fecha Hasta</span>
                                            <div class="row justify-content-md-center">
                                                <button id="btn_filtrar" type="submit" class="btn btn-primary col col-lg-3">Filtrar</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#proyecto_id').select2();
        $('#tipo').select2();
        $('#cliente_id').select2();
        $('#proveedor_id').select2();
        let desdeAux = "";
        let hastaAux = "";
        document.getElementById("advertencia").style.display = "none";
        function funcionDesde(val) {
            desdeAux = val;
            if (desdeAux > hastaAux && hastaAux != "") {
                document.getElementById("btn_filtrar").style.display = "none";
                document.getElementById("advertencia").style.display = "block";
                
            }else{
                document.getElementById("btn_filtrar").style.display = "block";
                document.getElementById("advertencia").style.display = "none";
            }
        }
        function funcionHasta(val) {
            hastaAux = val;
            if (desdeAux > hastaAux) {
                document.getElementById("btn_filtrar").style.display = "none";
                document.getElementById("advertencia").style.display = "block";
            }else{
                document.getElementById("btn_filtrar").style.display = "block";
                document.getElementById("advertencia").style.display = "none";
            }
        }
        
        $('#tipo').on('select2:select', function(e) {
            var data = e.params.data;
            console.log(data.id);
            if (data.id != 1) { // es ingreso
                document.getElementById("cliente").style.display = "block";
                document.getElementById("proveedor").style.display = "none";
            } else { // es egreso
                document.getElementById("proveedor").style.display = "block";
                document.getElementById("cliente").style.display = "none";
            }
        });
    </script>
@endpush
@endcan
@endif
