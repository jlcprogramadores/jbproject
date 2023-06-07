<div class="text-dark" >
    <style>
    .btn-check:checked+.btn-outline-secondary {
        background-color:#ced4da;
        color: #212529;
        border: 1px #ced4da;
    }
    .btn-outline-secondary {
        border-color: #ced4da;
    }
    .size {
        max-width: 100%;
        width: auto;
    }
    .filters th input {
        /* border: none; */
        border-color: #cbe4ff;
        background-color: transparent;
        color: #007bff;

    }
    .filters th input::placeholder {
        color: #007bff;
        background-color: transparent;

    }
    .form-control[readonly]{
        background-color: transparent;
    }
    </style>    
    <div class="row d-flex align-items-center size">
        <div class="col-sm-1" style="width: 175px;">
            <div class="input-group input-group-sm">
                <label class="input-group-text">Mostrar:</label>
                <select wire:model="perPage" class="form-select">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                    <option>100</option>
                </select>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="input-group input-group-sm">
                <label class="input-group-text">Orden por:</label>
                <select wire:model="orderBy" class="form-select">
                    <option value="id">no</option>
                    <option value="name">Name</option>
                    <option value="email">Email</option>
                    <option value="created_at">Sign Up Date</option>
                </select>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="btn-group btn-group-sm" role="group" aria-label="Orden">
                <input type="radio" wire:model="orderAsc" class="btn-check" name="order" id="asc" value="1">
                <label class="btn btn-outline-secondary color" for="asc">
                    <i class="fas fa-arrow-up"></i>
                </label>
            
                <input type="radio" wire:model="orderAsc" class="btn-check" name="order" id="desc" value="0">
                <label class="btn btn-outline-secondary color" for="desc">
                    <i class="fas fa-arrow-down"></i>
                </label>
            </div>
        </div>
    </div>
    <table class="table table-striped table-auto w-full mb-6">
        <thead>
            <tr class="filters">
                <th class="px-1 py-1">
                    <input wire:model="no" type="text" class="form-control" placeholder="No">
                </th>
                <th class="px-1 py-1">
                    <input wire:model="fecha_entrada" type="text" class="form-control" placeholder="Fecha Entrada">
                </th>
                <th class="px-1 py-1">
                    <input wire:model="fecha_salida" type="text" class="form-control" placeholder="Fecha Entrada">
                </th>
                <th class="px-1 py-1">
                    <input wire:model="vence" type="text" class="form-control" placeholder="Fecha Entrada">
                </th>
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
            </tr>
        </thead>
        <tbody>
            @foreach($finanzas as $item)
            <tr>
                <td>{{ $item->no}}</td>
                <td>{{ $item->fecha_entrada}}</td>
                <td>{{ $item->fecha_salida}}</td>
                <td>{{ $item->vence }}</td>
                <td>{{ $item->fecha_vencimiento }}</td>
                <td>{{ $item->dias }}</td>
                <td>
                    @if ($item->dias < 0)
                        <p class="badge bg-danger">{{ $item->estado }}</p>
                    @else
                        <p class="badge bg-warning text-dark">{{ $item->estado }}</p>
                    @endif
                </td>
                <td>{{ $item->tipo }}</td>
                <td>
                    {{ $item->fam_nombre? 'F: '.$item->fam_nombre : ''}}
                    <br>
                    {{ $item->cf_nombre? 'C: '.$item->cf_nombre : ''}}
                </td>
                <td>{{ $item->salidas_id ? $item->p_razon : $item->c_razon }}</td>
                <td>{{ $item->proyecto }}</td>
                <td>{{ $item->descripcion }}</td>
                <td>
                    @if ($item->fac_o_fol)
                        {{$item->fac_o_fol}}
                    @else
                        <p class="badge bg-danger">{{$item->salidas_id ? 'No facturado' : 'No Recibida' }}</p>
                    @endif
                </td>
                <td>{{$item->salidas_id ? $item->pro_nombre : $item->cli_nombre}}</td>
                <td>{{ $item->cantidad_unidad }}</td>
                <td>{{ $item->costo_unitario }}</td>
                <td>{{ $item->subtotal_total_mxn }}</td>
                <td>{{ $item->iva }}</td>
                <td>{{ $item->total_mxn }}</td>
                <td>{{ $item->monto_a_pagar }}</td>
                <td>{{ $item->fecha_de_pago }}</td>
                <td>{{ $item->metodo_de_pago }}</td>
                <td>
                    @if ($item->es_pagado == 'Pagado')
                        <p class="badge bg-success">Pagado</p>
                    @else
                        <p class="badge bg-danger">Pendiente</p>
                    @endif
                </td>
                <td>{{ $item->entregado_material_a }}</td>
                <td>{{ $item->a_meses }}</td>
                <td>{{ $item->fecha_facturacion }}</td>
                <td>{{ $item->comentario }}</td>
                <td>
                    @if ($item->comprobante == 'Enviado')
                        <p class="badge bg-success">Enviado</p>
                    @else  
                        <p class="badge bg-danger">Sin Enviar</p>
                    @endif
                </td>
                
                <td><span class="peque">{{ $item->usuario_edito }}</span>  <br/> <span class="peque">{{ $item->updated_at }}</span></td>
                <td>
                    <span class="completo">
                        <form action="{{ route('finanzas.destroy',$item->id) }}" method="POST">
                            @can('finanzas.confirmarpago')
                            <a class="btn btn-sm btn-info" href="{{ route('finanzas.confirmarPago',$item->id) }}"><i class="fa fa-fw fa-eye"></i> Actualizar Pago</a>      
                            @endcan
                            @if ($item->salidas_id)
                            @can('finanzas.correo')
                            <a class="btn btn-sm btn-secondary " href="{{ route('finanzas.correo',$item->id) }}"><i class="fa fa-fw fa-eye"></i> Correo</a>      
                            @endcan
                            @endif
                            @can('facturas.index')    
                            <a class="btn btn-sm btn-warning" href="{{ route('facturas.facturafinanzas', ['id' => $item->id]) }}"><i class="fa fa-fw fa-edit"></i> Factura</a>
                            @endcan
                            @can('finanzas.show')
                            <a class="btn btn-sm btn-primary " href="{{ route('finanzas.show',$item->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                            @endcan
                            @can('finanzas.edit')
                                @if (!empty($item->a_meses))
                                    <a class="btn btn-sm btn-success" href="{{ route('finanzas.editEgresoMeses',$item->id) }}"><i class="fa fa-fw fa-edit"></i>Editar</a>
                                @elseif($item->salidas_id)
                                    <a class="btn btn-sm btn-success" href="{{ route('finanzas.editEgreso',$item->id) }}"><i class="fa fa-fw fa-edit"></i>Editar</a>
                                @else
                                    <a class="btn btn-sm btn-success" href="{{ route('finanzas.editIngreso',$item->id) }}"><i class="fa fa-fw fa-edit"></i>Editar</a>
                                @endif
                            @endcan
                            @csrf
                            @method('DELETE')
                            @can('finanzas.destroy')
                            <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                            @endcan
                        </form>
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $finanzas->links() !!}
</div>