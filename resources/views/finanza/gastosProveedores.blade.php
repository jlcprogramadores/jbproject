@extends('adminlte::page')
@section('title', 'Gastos Proveedores')
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
                                        <table id="table" class="table table-striped table-hover" id="table">
                                            <thead class="thead">
                                                <tr>
                                                    <th>Proveedores</th>
                                                    <th>Pagado</th>
                                                    <th>Pendiente Pagar</th>
                                                    <th>Total General</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @foreach ($collection as $item) --}}
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                    
                                                {{-- @endforeach --}}
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
        function cargaTabla(){
            let proyectos = $('#proyecto_id').val();
            console.log(proyectos);
        }
        
    </script>
@endpush
