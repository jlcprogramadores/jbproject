@extends('layouts.app')
@section('title','Finanzas')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@endsection
@if(Auth::check() && Auth::user()->es_activo)
@can('finanzas.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-white border-secondary">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Finanzas') }}
                            </span>

                             <div class="float-right">
                                @can('finanzas.create')
                                <a href="{{ route('finanzas.egresoMeses') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Egresos A Meses') }}
                                </a> 
                                <a href="{{ route('finanzas.egreso') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Egresos') }}
                                </a> 
                                <a href="{{ route('finanzas.ingreso') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Ingresos') }}
                                </a>
                                @endcan
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('danger'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped display compact" id= "table" style="width:100%">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
										<th>Fecha Entrada</th>
										<th>Fecha Salida</th>
                                        <th>Vence</th>
                                        <th>Fecha vencimiento</th>
                                        <th>Días</th>
                                        <th>Estado</th>
										<th>Tipo I&E</th>    
                                        <th>Fam & Cat</th>
                                        <th>Razón social</th>
                                        <th>Proyecto</th>
										<th>Descripción</th>
                                        <th>Factura o Folio</th>
                                        <th>Proveedor o cliente</th>
										<th>Cantidad & Unidad</th>
										<th>Costo Unitario</th>
                                        <th>Subtotal Total MXN</th>
										<th>Iva</th>
                                        <th>Total $MXN$</th>
										<th>Monto A Pagar</th>
										<th>Fecha De Pago</th>
										<th>Metodo De Pago</th>
                                        <th>$ Estatus $</th>
										<th>Entregado Material A</th>
										<th>A Meses</th>
                                        <th>Fecha Facturacion</th>
										<th>Comentario</th>
                                        <th>Comprobante</th>
                                        <th>Fecha Actualización</th>
                                        <th>Acciones</th>
                                        <th>Acciones Especiales</th>
                                    </tr>
                                </thead>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endcan
@endif
@push('scripts')
    <script src="//code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
    
   
   
    


    <!-- Para los estilos en Excel     -->
    
    <script type="text/javascript">
        $(document).ready( function () {
            // $('#table thead tr').clone(true).addClass('filters').appendTo( '#table thead' );
            $('#table').DataTable({
                serverSide: true,
                ajax: {
                    url: '{{ route("finanzas.datos") }}',
                    type: 'GET',
                    data: function (d) {
                        d.start = d.start || 0;
                        d.length = d.length || 10;
                    }
                },
                "columns":[
                    { data: 'no'},
                    { data: 'fecha_entrada'},
                    { data: 'fecha_salida'},
                    { data: 'vence'},
                    { data: 'fecha_vencimiento'},
                    { data: 'dias'},
                    { data: 'estadoPintado'},
                    { data: 'tipo_i&e'},
                    { data: 'fam_&_cat'},
                    { data: 'razon_social'},
                    { data: 'proyecto'},
                    { data: 'descripción'},
                    { data: 'facturaPintado'},
                    { data: 'proveedor_o_cliente'},
                    { data: 'cantidad_&_unidad'},
                    { data: 'costo_unitario'},
                    { data: 'subtotal_total_mxn'},
                    { data: 'iva'},
                    { data: 'total_mxn'},
                    { data: 'monto_a_pagar'},
                    { data: 'fecha_de_pago'},
                    { data: 'metodo_de_pago'},
                    { data: 'estatusPintado'},
                    { data: 'entregado_material_a'},
                    { data: 'a_meses'},
                    { data: 'fecha_facturacion'},
                    { data: 'comentario'},
                    { data: 'comprobantePintado'},
                    { data: 'fecha_actualizacion'},
                    { data: 'action'},
                    { data: 'actionSpc'},
                ],
                paging: true,
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                pageLength: 10,
                processing: true,
                serverSide: true,
                drawCallback: function (settings) {
                    // Actualizar el número de página en la URL para compartir enlaces
                    var api = this.api();
                    var pageInfo = api.page.info();
                    window.history.replaceState({}, '', updateQueryStringParameter('page', pageInfo.page + 1));
                }
            });
            function updateQueryStringParameter(key, value) {
                var baseUrl = [location.protocol, '//', location.host, location.pathname].join('');
                var urlQueryString = document.location.search;
                var newParam = key + '=' + value;

                // Si el parámetro ya existe, reemplazarlo
                if (urlQueryString) {
                    var keyRegex = new RegExp('([?&])' + key + '[^&]*');
                    if (urlQueryString.match(keyRegex)) {
                        newParam = '$1' + newParam;
                        baseUrl = baseUrl.replace(keyRegex, newParam);
                    } else {
                        // Si no existe, agregarlo al final
                        baseUrl = [baseUrl, newParam].join('?');
                    }
                } else {
                    // Si no hay parámetros en la URL, agregar el primero
                    baseUrl = [baseUrl, '?', newParam].join('');
                }
                return baseUrl;
            }
            $('.show_confirm').click(function(event) {
                var form =  $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                Swal.fire({
                title: '¿Estas seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'advertencia',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, bórralo!',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // si se cumple el formulario lanza el swal
                        if (form.submit()) {
                            Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Su registro ha sido eliminado.',
                            showConfirmButton: false,
                            timer: 1500
                            })    
                        }
                    }
                })
            });
        });
    </script>
@endpush
