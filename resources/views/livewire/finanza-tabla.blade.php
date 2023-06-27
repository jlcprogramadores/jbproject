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
    .completo {
        white-space: normal !important;
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
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="no" type="text" class="form-control" placeholder="No">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="fecha_entrada" type="text" class="form-control" placeholder="Fecha Entrada">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="fecha_salida" type="text" class="form-control" placeholder="Fecha Salida">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="vence" type="text" class="form-control" placeholder="Vence">
                </th>

                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="fecha_vencimiento" type="text" class="form-control" placeholder="fecha Vencimiento">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="dias" type="text" class="form-control" placeholder="Días">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="estado" type="text" class="form-control" placeholder="Estado">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="tipo" type="text" class="form-control" placeholder="Tipo I&E">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="fam_cat" type="text" class="form-control" placeholder="Fam & Cat">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="razon_social" type="text" class="form-control" placeholder="Razón social">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="proyecto" type="text" class="form-control" placeholder="Proyecto">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="descripcion" type="text" class="form-control" placeholder="Descripción">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="factura_folio" type="text" class="form-control" placeholder="Factura o Folios">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="provedor_cliente" type="text" class="form-control" placeholder="Proveedor o cliente">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="cantidad_unidad" type="text" class="form-control" placeholder="Cantidad & Unidad">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="costo_unitario" type="text" class="form-control" placeholder="Costo Unitario">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="subtotal" type="text" class="form-control" placeholder="Subtotal MXN">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="iva" type="text" class="form-control" placeholder="IVA">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="total" type="text" class="form-control" placeholder="Total $MXN$">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="monto_pagar" type="text" class="form-control" placeholder="Monto A Pagar">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="fecha_pago" type="text" class="form-control" placeholder="Fecha De Pago">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="metodo_pago" type="text" class="form-control" placeholder="Metodo De Pago">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="estatus" type="text" class="form-control" placeholder="$ Estatus $">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="entregado" type="text" class="form-control" placeholder="Entregado Material A">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="a_meses" type="text" class="form-control" placeholder="A Meses">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="fecha_facturacion" type="text" class="form-control" placeholder="Fecha Facturacion">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="comentario" type="text" class="form-control" placeholder="Comentario">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">ooooooooooooooo</span>
                    <input wire:model="comprobante" type="text" class="form-control" placeholder="Comprobante">
                </th>
                <th>Fecha Actualización</th>

                <th>Acciones</th>
                <th>Acc. Especiales</th>
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
                <td>{{ $item->fam_cat}}</td>
                <td>{{ $item->razon_social }}</td>
                <td>{{ $item->proyecto }}</td>
                <td>{{ $item->descripcion }}</td>
                <td>
                    @if ($item->fac_o_fol=='No Facturado' || $item->fac_o_fol=='No Recibido')
                    <p class="badge bg-danger">{{$item->fac_o_fol}}</p>
                    @else
                    {{$item->fac_o_fol}}
                    @endif
                </td>
                <td>{{$item->salidas_id ? $item->pro_nombre : $item->cli_nombre}}</td>
                <td>{{ $item->cantidad_unidad }}</td>
                <td>{{ $item->costo_unitario }}</td>
                <td>{{ $item->subtotal_total_mxn }}</td>
                <td>{{ $item->iva }}</td>
                <td>{{ $item->total }}</td>
                <td>{{ $item->monto_pagar }}</td>
                <td>{{ $item->fecha_de_pago }}</td>
                <td>{{ $item->metodo_de_pago }}</td>
                <td>
                    @if ($item->es_pagado == 'Pagado')
                        <p class="badge bg-success">Pagado</p>
                    @else
                        <p class="badge bg-danger">Pendiente</p>
                    @endif
                </td>
                <td>{{ $item->entregado }}</td>
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
                           
                            @can('finanzas.show')
                                <a class="btn btn-sm btn-primary " href="{{ route('finanzas.show',$item->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                            @endcan
                            @can('finanzas.edit')
                                @if (!empty($item->a_meses))
                                    <a class="btn btn-sm btn-success" href="{{ route('finanzas.editEgresoMeses',$item->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                @elseif($item->salidas_id)
                                    <a class="btn btn-sm btn-success" href="{{ route('finanzas.editEgreso',$item->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                @else
                                    <a class="btn btn-sm btn-success" href="{{ route('finanzas.editIngreso',$item->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                @endif
                            @endcan
                            @csrf
                            @method('DELETE')
                            @can('finanzas.destroy')
                            <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i></button>
                            @endcan
                        </form>
                    </span>
                </td>
                <td>
                    @can('finanzas.confirmarpago')
                        <a class="btn btn-sm btn-info" href="{{ route('finanzas.confirmarPago',$item->id) }}"><i class="fas fa-credit-card"></i> Actualizar Pago</a>      
                    @endcan
                    @if ($item->salidas_id)
                        @can('finanzas.correo')
                            <a class="btn btn-sm btn-secondary " href="{{ route('finanzas.correo',$item->id) }}"><i class="fas fa-envelope"></i> Correo</a>      
                        @endcan
                    @endif
                    @can('facturas.index')    
                        <a class="btn btn-sm btn-warning" href="{{ route('facturas.facturafinanzas', ['id' => $item->id]) }}"><i class="fas fa-file-invoice"></i> Factura</a>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $finanzas->links() !!}
</div>