@extends('layouts.app')
@section('title','Empleado')
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
                                {{ __('Empleado') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('empleados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Empleado') }}
                                </a>
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
                                        
										<th>Proyecto Id</th>
										<th>Puesto Id</th>
										<th>No Empleado</th>
										<th>Apellido Materno</th>
										<th>Apellido Paterno</th>
										<th>Nombre</th>
										<th>Genero</th>
										<th>Telefono Personal</th>
										<th>Correo</th>
										<th>Salario Imss</th>
										<th>Salario Real</th>
										<th>Tipo De Empleado</th>
										<th>Evaluaciones</th>
										<th>Dc3</th>
										<th>Clims</th>
										<th>Fecha Ingreso</th>
										<th>Fecha Baja</th>
										<th>Nuevo Ingreso Reingreso</th>
										<th>Campamento</th>
										<th>Identificacion Oficial</th>
										<th>Curp</th>
										<th>Rfc</th>
										<th>Domicilio</th>
										<th>Nss</th>
										<th>Fecha Nacimiento</th>
										<th>Lugar Nacimiento</th>
										<th>Residencia</th>
										<th>Vacunas Covid</th>
										<th>Licencia Conducir</th>
										<th>Carta Antecedentes</th>
										<th>Estado Civil</th>
										<th>Nivel Estudios</th>
										<th>Infonavit</th>
										<th>Fonacot</th>
										<th>Cuenta Bancaria</th>
										<th>Contacto Emergencia</th>
										<th>Nombre Esposa</th>
										<th>No Hijos</th>
										<th>Persona Para Tramites</th>
										<th>Beneficiarios</th>
										<th>Porcentaje</th>
										<th>Domicilio Real</th>
										<th>Domicilio Alterno</th>
										<th>Talla Camisa</th>
										<th>Talla Pantalon</th>
										<th>Talla Calzado</th>
										<th>Enfermedades</th>
										<th>Cirugias</th>
										<th>Alergias</th>
										<th>Lentes</th>
										<th>Lesiones</th>
										<th>Fumador</th>
										<th>Practica Deporte</th>
										<th>Pertenece Club Social</th>
										<th>Pertenece Sindicato</th>
										<th>Toma Medicamento</th>
										<th>Tipo Sangre</th>
										<th>Peso</th>
										<th>Estatura</th>
										<th>Imc</th>
										<th>Esta Trabajando</th>
										<th>Usuario Edito</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleados as $empleado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ isset($empleado->proyecto->nombre) ? $empleado->proyecto->nombre : 'Sin Proyecto'}}</td>
											<td>{{ isset($empleado->puesto->nombre) ? $empleado->puesto->nombre : 'Sin Puesto'}}</td>
											<td>{{ $empleado->no_empleado }}</td>
											<td>{{ $empleado->apellido_materno }}</td>
											<td>{{ $empleado->apellido_paterno }}</td>
											<td>{{ $empleado->nombre }}</td>
											<td>{{ $empleado->genero }}</td>
											<td>{{ $empleado->telefono_personal }}</td>
											<td>{{ $empleado->correo }}</td>
											<td>{{ $empleado->salario_imss }}</td>
											<td>{{ $empleado->salario_real }}</td>
											<td>{{ $empleado->tipo_de_empleado }}</td>
											<td>{{ $empleado->evaluaciones }}</td>
											<td>{{ $empleado->dc3 }}</td>
											<td>{{ $empleado->clims }}</td>
											<td>{{ $empleado->fecha_ingreso }}</td>
											<td>{{ $empleado->fecha_baja }}</td>
											<td>{{ $empleado->nuevo_ingreso_reingreso }}</td>
											<td>{{ $empleado->campamento }}</td>
											<td>{{ $empleado->identificacion_oficial }}</td>
											<td>{{ $empleado->curp }}</td>
											<td>{{ $empleado->rfc }}</td>
											<td>{{ $empleado->domicilio }}</td>
											<td>{{ $empleado->nss }}</td>
											<td>{{ $empleado->fecha_nacimiento }}</td>
											<td>{{ $empleado->lugar_nacimiento }}</td>
											<td>{{ $empleado->residencia }}</td>
											<td>{{ $empleado->vacunas_covid }}</td>
											<td>{{ $empleado->licencia_conducir }}</td>
											<td>{{ $empleado->carta_antecedentes }}</td>
											<td>{{ $empleado->estado_civil }}</td>
											<td>{{ $empleado->nivel_estudios }}</td>
											<td>{{ $empleado->infonavit }}</td>
											<td>{{ $empleado->fonacot }}</td>
											<td>{{ $empleado->cuenta_bancaria }}</td>
											<td>{{ $empleado->contacto_emergencia }}</td>
											<td>{{ $empleado->nombre_esposa }}</td>
											<td>{{ $empleado->no_hijos }}</td>
											<td>{{ $empleado->persona_para_tramites }}</td>
											<td>{{ $empleado->beneficiarios }}</td>
											<td>{{ $empleado->porcentaje }}</td>
											<td>{{ $empleado->domicilio_real }}</td>
											<td>{{ $empleado->domicilio_alterno }}</td>
											<td>{{ $empleado->talla_camisa }}</td>
											<td>{{ $empleado->talla_pantalon }}</td>
											<td>{{ $empleado->talla_calzado }}</td>
											<td>{{ $empleado->enfermedades }}</td>
											<td>{{ $empleado->cirugias }}</td>
											<td>{{ $empleado->alergias }}</td>
											<td>{{ $empleado->lentes }}</td>
											<td>{{ $empleado->lesiones }}</td>
											<td>{{ $empleado->fumador }}</td>
											<td>{{ $empleado->practica_deporte }}</td>
											<td>{{ $empleado->pertenece_club_social }}</td>
											<td>{{ $empleado->pertenece_sindicato }}</td>
											<td>{{ $empleado->toma_medicamento }}</td>
											<td>{{ $empleado->tipo_sangre }}</td>
											<td>{{ $empleado->peso }}</td>
											<td>{{ $empleado->estatura }}</td>
											<td>{{ $empleado->imc }}</td>
											<td>{{ $empleado->esta_trabajando }}</td>
											<td>{{ $empleado->usuario_edito }}</td>

                                            <td>
                                                <form action="{{ route('empleados.destroy',$empleado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('empleados.show',$empleado->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('empleados.edit',$empleado->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
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
@endif