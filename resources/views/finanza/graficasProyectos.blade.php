@extends('layouts.app')

@section('title', 'Gráfica Ingresos vs Egresos')
@if (Auth::check() && Auth::user()->es_activo)
    @can('finanzas.graficas')
        @section('content')
            <section class="content container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <span class="card-title">Gráficas por proyecto</span>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('finanzas.graficas') }}" role="form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="container">
                                        <div class="row">

                                            <div class="col-sm p-1 form-group ">
                                                <label for="desde">Fecha inico:</label>
                                                <br>
                                                <input id="desde" type="date" name="desde" class="form-control"
                                                    onchange="funcionDesde(this.value)" required>
                                            </div>
                                            <div class="col-sm p-1 form-group ">

                                                <label for="hasta">Fecha fin:</label>
                                                <br>
                                                <input type="date" name="hasta" id="hasta" class="form-control"
                                                    onchange="funcionHasta(this.value)" required>
                                            </div>
                                            <div class="col-5 p-1 form-group ">
                                                <label class="proyecto_id" name="Ingreso_id" for="Ingreso_id">Proyecto a
                                                    Gráficar:</label>
                                                <br>
                                                <select class="form-control" id="proyecto_id" name="proyecto_id">
                                                    <option value="" selected="selected">Selecciona Proyecto</option>
                                                    @foreach ($proyecto as $val => $name)
                                                        <option value="{{ $val }}">{{ $name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row justify-content-md-center">
                                        <button id="btn_graficar" type="submit"
                                            class="btn btn-primary col col-lg-3">Gráficar</button>
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
                let desdeAux = "";
                let hastaAux = "";
                document.getElementById("advertencia").style.display = "none";

                function funcionDesde(val) {
                    desdeAux = val;
                    if (desdeAux > hastaAux && hastaAux != "") {
                        document.getElementById("btn_filtrar").style.display = "none";
                        document.getElementById("advertencia").style.display = "block";

                    } else {
                        document.getElementById("btn_filtrar").style.display = "block";
                        document.getElementById("advertencia").style.display = "none";
                    }
                }

                function funcionHasta(val) {
                    hastaAux = val;
                    if (desdeAux > hastaAux) {
                        document.getElementById("btn_filtrar").style.display = "none";
                        document.getElementById("advertencia").style.display = "block";
                    } else {
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
