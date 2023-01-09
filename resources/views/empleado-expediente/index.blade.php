@extends('layouts.app')

@section('title','Expedientes de Empleados')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-white border-secondary">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Expediente de Empleado') }}
                            </span>

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
                                        
										<th>Empleado</th>
                                        <th>Fecha Limite</th>
										<th>Fecha Actualización</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleados as $empleado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $empleado->nombre }}</td>


                                            @if ($empleado->fecha_limite_expediente)
                                                <?php 
                                                    $fechaActual = Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
                                                    $fechaLimite = Carbon\Carbon::parse( $empleado->fecha_limite_expediente)->format('Y-m-d');
                                                    
                                                    $shippingDate = Carbon\Carbon::createFromFormat('Y-m-d',$fechaLimite );
                                                    $diferencia_en_dias = $fechaActual->diffInDays($shippingDate);
                                                    //  si ya se paso el dia se concidera vencido
                                                    $estaVencido = false;

                                                ?>
                                                {{-- mayor iguala a 4 verde
                                                    = 3 marillo
                                                    si es menor rojo  --}}
                                                @if ($fechaActual > $fechaLimite && $diferencia_en_dias != 0)
                                                <td>
                                                    <p class="bg-danger text-white" >
                                                        Vencido
                                                        <br>
                                                        {{Carbon\Carbon::parse($empleado->fecha_limite_expediente)->format('Y-m-d')}}
                                                    </p>
                                                </td>
                                                @else     
                                                    <td> 
                                                        @if ($diferencia_en_dias >= 4)
                                                            <p class=" bg-success text-white" >
                                                                Restan {{$diferencia_en_dias}} días
                                                                <br>
                                                                {{Carbon\Carbon::parse($empleado->fecha_limite_expediente)->format('Y-m-d')}}
                                                            </p>
                                                        @elseif($diferencia_en_dias == 3)
                                                            <p class="bg-warning text-dark" >
                                                                Restan {{$diferencia_en_dias}} días
                                                                <br>
                                                                {{Carbon\Carbon::parse($empleado->fecha_limite_expediente)->format('Y-m-d')}}

                                                            </p>
                                                        @elseif($diferencia_en_dias >= -1)
                                                            <p class="bg-danger text-white" >
                                                                Restan {{$diferencia_en_dias}} días
                                                                <br>
                                                                {{Carbon\Carbon::parse($empleado->fecha_limite_expediente)->format('Y-m-d')}}
                                                            </p>
                                                        @endif

                                                    </td>
                                                @endif
                                            @else
                                                <td></td>
                                            @endif

											<td>{{ $empleado->usuario_edito }} <br/> {{ $empleado->updated_at }}</td>  
                                            <td>
                                                <form action="{{ route('empleado-expedientes.destroy',$empleado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-warning " href="{{ route('empleados.editarfechalimite',$empleado->id) }}"><i class="fa fa-fw fa-eye"></i>Fecha limite</a>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('empleado-expedientes.showPorEmpleado',$empleado->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar Expediente</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('empleado-expedientes.editExpediente',$empleado->id) }}"><i class="fa fa-fw fa-edit"></i> Editar Expediente</a>
                                                    @csrf
                                                </form>
                                            </td>
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