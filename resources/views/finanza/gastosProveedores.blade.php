@extends('adminlte::page')
@section('title', 'Gastos Proveedores')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        color: #000000 !important;
    }
</style>
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span class="card-title">Gastos Proveedores</span>
                    </div>
                    <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <label class="invisible">Acción</label>
                                    <button type="button" id="btn_carga" onclick="cargaTabla();" class="btn btn-primary col">Carga Proyectos</button>
                                </div>
                                <div class="col-10 p-1 form-group ">
                                    <label class="proyecto_id">Selecciona los proyectos a cargar:</label>
                                    <br>
                                    <select class="form-control" id="proyecto_id" name="proyectos[]" multiple="multiple">
                                        <option value="" selected="selected">Todos los proyectos</option>
                                        @foreach ($proyecto as $val => $name)
                                            <option value="{{ $val }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <span id="body_tabla">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table id="tabla" class="table table-striped table-hover" id="table">
                                            <thead class="thead">
                                                <tr>
                                                    <th>nombre</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $('#proyecto_id').select2();
        // hace la consulta en base a los proyectos seccionados
        async function cargaTabla(){
            let proyectos = $('#proyecto_id').val();
            let datos = await getDatos('tablaGastosProveedores',proyectos);
            
            // Reinicia y carga tabla
            let tabla = $('#tabla').DataTable();
            await tabla.destroy();
            tabla = $('#tabla').DataTable({
                data: datos, // Pasar el arreglo de datos
                columns: [
                    { data: 'nombre', name: 'nombre' },
                ]
            });
        }
        
        async function getDatos(url, datos) {
            try {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let response = await $.ajax({
                    type: "POST",
                    url: "/" + url,
                    data: JSON.stringify(datos),
                    contentType: "application/json",
                });
                let respuesta = JSON.parse(response);
                return respuesta;
            } catch (error) {
                return null;
            }
        }
    </script>
@endpush
