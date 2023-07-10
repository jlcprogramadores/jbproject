@extends('adminlte::page')
@section('title','Empleados')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-white border-secondary">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Empleados') }}
                            </span>
                            <div class="float-right">
                                @can('empleados.acciones')
                                <a  href="{{ route('historial-altas.index') }}" class="btn btn-warning btn-sm float-right"  data-placement="left">
                                    {{ __('Historial Estado') }}
                                </a> 
                                <a href="{{ route('empleados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Empleado') }}
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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>No.Empleado</th>
                                        <th>Fotografía</th>
										<th>Nombre</th>
										<th>Proyecto</th>
										<th>Puesto</th>
                                        <th>Salario IMSS</th>
                                        <th>Salario Real</th>
										<th>Teléfono Personal</th>
										<th>Correo</th>
										<th>Estado</th>
										<th>Fin de contrato</th>
										<th>Fecha Actualización</th>

                                        @can('empleados.acciones')
                                            <th>Acciones</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleados as $empleado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <td>
                                                {{-- fomato empleado --}}
                                                <?php 
                                                    $concatenado = isset($empleado->proyecto->mina) ? '-'.$empleado->proyecto->mina->abreviacion : '';
                                                    $fecha = $empleado->fecha_no_empleado ? Carbon\Carbon::parse($empleado->fecha_no_empleado)->format('dmy') : '';
                                                ?>
                                                {{ 'JB-'.$fecha.'-'.$empleado->no_empleado.$concatenado }}
                                            </td>

                                            @if ($empleado->fotografia)
                                                <td> <img src={{ $empleado->fotografia }} height="100" ></td> 
                                            @else
                                                <td><span class="badge bg-danger">Sin Fotografía</span></td>
                                            @endif 
                                            <td>{{ $empleado->nombre }}</td>
											<td>{{ isset($empleado->proyecto->nombre) ? $empleado->proyecto->nombre : 'Sin Proyecto'}}</td>
											<td>{{ isset($empleado->puesto->nombre) ? $empleado->puesto->nombre : 'Sin Puesto'}}</td>
                                            <td>{{ '$'. number_format($empleado->salario_imss,2) }}</td>
                                            <td>{{ '$'. number_format($empleado->salario_real,2) }}</td>
											<td>{{ $empleado->telefono_personal }}</td>
											<td>{{ $empleado->correo}}</td>
                                            <td>
                                                @if ($empleado->esta_trabajando)
                                                <span class="badge bg-success">Alta</span>
                                                @else
                                                <span class="badge bg-danger">Baja</span>
                                                @endif
                                            </td>
                                            @if ($empleado->fecha_fin)
                                                <?php 
                                                    $fechaActual = Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
                                                    $fechaLimite = Carbon\Carbon::parse( $empleado->fecha_fin)->format('Y-m-d');
                                                    
                                                    $shippingDate = Carbon\Carbon::createFromFormat('Y-m-d',$fechaLimite );
                                                    $diferencia_en_dias = $fechaActual->diffInDays($shippingDate);
                                                    $estaVencido = false;
                                                ?>
                                                @if ($fechaActual > $fechaLimite && $diferencia_en_dias != 0)
                                                <td>
                                                    <p class="bg-danger text-white" >
                                                        Vencido
                                                        <br>
                                                        {{Carbon\Carbon::parse($empleado->fecha_fin)->format('Y-m-d')}}
                                                    </p>
                                                </td>
                                                @else     
                                                    <td> 
                                                        @if ($diferencia_en_dias > 10)
                                                            <p class=" bg-success text-white" >
                                                                Restan {{$diferencia_en_dias}} días
                                                                <br>
                                                                {{Carbon\Carbon::parse($empleado->fecha_fin)->format('Y-m-d')}}
                                                            </p>
                                                        @elseif($diferencia_en_dias >= -1)
                                                            <p class="bg-warning text-white" >
                                                                Restan {{$diferencia_en_dias}} días
                                                                <br>
                                                                {{Carbon\Carbon::parse($empleado->fecha_fin)->format('Y-m-d')}}
                                                            </p>
                                                        @endif
                                                    </td>
                                                @endif
                                            @else
                                                <td></td>
                                            @endif
                                            <td><span class="peque">{{ $empleado->usuario_edito }}</span>  <br/> <span class="peque">{{ $empleado->updated_at }}</span></td>
                                            @can('empleados.acciones')
                                            <td>
                                                <form action="{{ route('empleados.destroy',$empleado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-warning " href="{{ route('historial-altas.crearporempleado',$empleado->id) }}"><i class="fa fa-fw fa-eye"></i>Cambio De Estado</a>
                                                    <a class="btn btn-sm btn-warning " href="{{ route('empleados.capacitaciones',$empleado->id) }}"><i class="fa fa-fw fa-eye"></i> Capacitaciones</a>
                                                    <a class="btn btn-sm btn-warning " href="{{ route('historial-contrato.index',$empleado->id) }}"><i class="fa fa-fw fa-eye"></i> Contrato</a>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('empleados.show',$empleado->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('empleados.edit',$empleado->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                </form>
                                            </td>
                                            @endcan
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endif
@push('scripts')
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#table thead tr').clone(true).addClass('filters').appendTo( '#table thead' );
            $('#table').DataTable({
                responsive:true,
                autoWidth: false,   
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Nothing found - sorry",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Buscar:",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                orderCellsTop: true,
                fixedHeader: true,
                initComplete: function() {
                    var api = this.api();
                    // For each column
                    api.columns().eq(0).each(function(colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq($(api.column(colIdx).header()).index());
                        var title = $(cell).text();
                        $(cell).html( '<input type="text" placeholder="'+title+'" />' );
                        // On every keypress in this input
                        $('input', $('.filters th').eq($(api.column(colIdx).header()).index()) )
                            .off('keyup change')
                            .on('keyup change', function (e) {
                                e.stopPropagation();
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})'; //$(this).parents('th').find('select').val();
                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search((this.value != "") ? regexr.replace('{search}', '((('+this.value+')))') : "", this.value != "", this.value == "")
                                    .draw();
                                $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
                }
            });
        });
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
    </script>
@endpush