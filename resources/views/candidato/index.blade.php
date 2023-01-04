@extends('layouts.app')
@section('title','Bolsa de Trabajo')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection
@if(Auth::check() && Auth::user()->es_activo)
@can('bolsatrabajo.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-white border-secondary">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Candidatos') }}
                            </span>
                            @can('bolsatrabajo.create')
                             <div class="float-right">
                                <a href="{{ route('candidatos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Candidato') }}
                                </a>
                              </div>
                            @endcan
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover"  id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre Completo</th>
										<th>Teléfono Personal</th>
										<th>Correo</th>
										<th>Currículum</th>
										<th>Evaluación</th>
                                        <th>Semáforo</th>
										<th>Género</th>
										<th>Fecha Actualización</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($candidatos as $candidato)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $candidato->nombre }}</td>
											<td>{{ $candidato->telefono_personal }}</td>
											<td>{{ $candidato->correo }}</td>
                                            @if ($candidato->curriculum)
                                                <td><a href="{{$candidato->curriculum}}">Link Currículum</a></td> 
                                            @else
                                                <td><span class="text-danger">Sin Currículum</span></td>
                                            @endif 
                                            <?php 
                                                $v1 = $candidato->validacion_1;
                                                $v2 = $candidato->validacion_2;
                                                $v3 = $candidato->validacion_3;
                                            ?>
                                           
                                            <td > 

                                                    @if (is_null($v1))
                                                        <span> 
                                                            Alex: <p class="badge bg-secondary">Sin Evaluar</p>,
                                                        </span> 
                                                    @elseif($v1 == 1)
                                                        <span>
                                                            Alex: <p class="badge bg-success">Aceptado</p>,
                                                        </span>
                                                    @else
                                                        <span>
                                                            Alex: <p class="badge bg-danger">Rechazado</p>,
                                                        </span>
                                                    @endif

                                                    @if (is_null($v2))
                                                        <span>
                                                            Cecy: <p class="badge bg-secondary">Sin Evaluar</p>,
                                                        </span>
                                                    @elseif($v2 == 1)
                                                        <span>
                                                            Cecy: <p class="badge bg-success">Aceptado</p>,
                                                        </span>
                                                    @else
                                                        <span>
                                                            Cecy: <p class="badge bg-danger">Rechazado</p>,
                                                        </span>
                                                    @endif

                                                    @if (is_null($v3))
                                                        <span>
                                                            Javier: <p class="badge bg-secondary">Sin Evaluar</p>,
                                                        </span>
                                                    @elseif($v3 == 1)
                                                        <span>
                                                            Javier: <p class="badge bg-success">Aceptado</p>,
                                                        </span>
                                                    @else
                                                        <span>
                                                            Javier: <p class="badge bg-danger">Rechazado</p>,
                                                        </span>
                                                    @endif



                                            </td>
                                            
                                            <td></span> <p class="badge bg-secondary">En trámite</p><br></td>

                                            @if ($candidato->genero == 0)
                                                <td>Masculino</td>
                                            @elseif ($candidato->genero == 1)
                                                <td>Femenino</td>
                                            @else
                                                <td>Otro</td>
                                            @endif 
											<td>{{ $candidato->usuario_edito }}  <br/> {{ $candidato->updated_at }}</td>
                                            <td>
                                                <form action="{{ route('candidatos.destroy',$candidato->id) }}" method="POST">
                                                    @if ( Auth::user()->hasRole('Validador_1') || Auth::user()->hasRole('Validador_2') || Auth::user()->hasRole('Validador_3'))
                                                        <a class="btn btn-sm btn-warning " href="{{ route('candidatos.evaluar',$candidato->id) }}"><i class="fa fa-fw fa-eye"></i>Evaluar</a>
                                                    @endif 
                                                    @can('bolsatrabajo.show')
                                                    <a class="btn btn-sm btn-primary " href="{{ route('candidatos.show',$candidato->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    @endcan
                                                    @can('bolsatrabajo.edit')
                                                    <a class="btn btn-sm btn-success" href="{{ route('candidatos.edit',$candidato->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('bolsatrabajo.destroy')
                                                    <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $candidatos->links() !!}
            </div>
        </div>
    </div>
@endsection
@endcan
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
                    "zeroRecords": "No se encontró nada – lo siento",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Buscar:",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                columnDefs: [{
                    // espeificamos que columna sera afectada
                    targets: [5,6],
                    render: function(data, type, full, meta) {    
                        return '<div class="truncate">' + data.split(",").join("<br/>") + '</div>';
                    }
                }],
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