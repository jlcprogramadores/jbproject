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
    .filters{
        white-space: nowrap;
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
    <div class="d-flex flex-row">
        <div class="p-2">
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
        <div class="p-2">
            <div class="input-group input-group-sm">
                <label class="input-group-text">Orden por:</label>
                <select wire:model="orderBy" class="form-select">
                    <option value="no">No</option>
                    <option value="fecha_entrada">Fecha Entrada</option>
                    <option value="fecha_salida">Fecha Salida</option>
                    <option value="vence">Vence</option>
                    <option value="fecha_vencimiento">Fecha Vencimiento</option>
                    <option value="dias">Días</option>
                    <option value="estado">Estado</option>
                    <option value="tipo">Tipo I&E</option>
                    <option value="fam_cat">Fam & Cat</option>
                    <option value="razon_social">Razón Social</option>
                    <option value="proyecto">Proyecto</option>
                    <option value="descripcion">Descripción</option>
                    <option value="factura_folio">Factora o Folio</option>
                    <option value="provedor_cliente">Proveedor o Cliente</option>
                    <option value="cantidad_unidad">Cantidad & Unidad</option>
                    <option value="costo_unitario">Costo Unitario</option>
                    <option value="subtotal">Subtotal</option>
                    <option value="iva">IVA</option>
                    <option value="total">Total</option>
                    <option value="monto_pagar">Monto A Pagar</option>
                    <option value="fecha_pago">Fecha De Pago</option>
                    <option value="metodo_pago">Método de pago</option>
                    <option value="estatus">Estatus</option>
                    <option value="entregado">Entregado Material</option>
                    <option value="a_meses">A Meses</option>
                    <option value="fecha_facturacion">Fecha Facturación</option>
                    <option value="comentario">Comentario</option>
                    <option value="comprobante">Comprobante</option>
                </select>
            </div>
        </div>
        <div class="p-2">
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
        <div class="p-2">
            <button class="btn btn-sm btn-outline-success color" wire:click="export">
                Excel
            </button>
        </div>
    </div>
    <table class="table table-sm table-striped table-auto w-full mb-6">
        <thead>
            <tr class="filters">
                <th class="px-1 py-1">
                    <span class="invisible">---No---</span>
                    <input wire:model="no" type="text" class="form-control" placeholder="No">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Fecha Entrada---</span>
                    <input wire:model="fecha_entrada" type="text" class="form-control" placeholder="Fecha Entrada">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Fecha Salida---</span>
                    <input wire:model="fecha_salida" type="text" class="form-control" placeholder="Fecha Salida">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Vence---</span>
                    <input wire:model="vence" type="text" class="form-control" placeholder="Vence">
                </th>

                <th class="px-1 py-1">
                    <span class="invisible">---fecha Vencimiento---</span>
                    <input wire:model="fecha_vencimiento" type="text" class="form-control" placeholder="fecha Vencimiento">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Días---</span>
                    <input wire:model="dias" type="text" class="form-control" placeholder="Días">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Estado---</span>
                    <input wire:model="estado" type="text" class="form-control" placeholder="Estado">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Tipo I&E---</span>
                    <input wire:model="tipo" type="text" class="form-control" placeholder="Tipo I&E">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Fam & Cat---</span>
                    <input wire:model="fam_cat" type="text" class="form-control" placeholder="Fam & Cat">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Razón social---</span>
                    <input wire:model="razon_social" type="text" class="form-control" placeholder="Razón social">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Proyecto---</span>
                    <input wire:model="proyecto" type="text" class="form-control" placeholder="Proyecto">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Descripción---</span>
                    <input wire:model="descripcion" type="text" class="form-control" placeholder="Descripción">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Factura/Folio---</span>
                    <input wire:model="factura_folio" type="text" class="form-control" placeholder="Factura/Folio">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Proveedor/cliente---</span>
                    <input wire:model="provedor_cliente" type="text" class="form-control" placeholder="Proveedor/cliente">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Cantidad & Unidad---</span>
                    <input wire:model="cantidad_unidad" type="text" class="form-control" placeholder="Cantidad & Unidad">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Costo Unitario---</span>
                    <input wire:model="costo_unitario" type="text" class="form-control" placeholder="Costo Unitario">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Subtotal MXN---</span>
                    <input wire:model="subtotal" type="text" class="form-control" placeholder="Subtotal MXN">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---IVA---</span>
                    <input wire:model="iva" type="text" class="form-control" placeholder="IVA">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Total $MXN$---</span>
                    <input wire:model="total" type="text" class="form-control" placeholder="Total $MXN$">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Monto A Pagar---</span>
                    <input wire:model="monto_pagar" type="text" class="form-control" placeholder="Monto A Pagar">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Fecha De Pago---</span>
                    <input wire:model="fecha_pago" type="text" class="form-control" placeholder="Fecha De Pago">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Método De Pago---</span>
                    <input wire:model="metodo_pago" type="text" class="form-control" placeholder="Método De Pago">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---$ Estatus $---</span>
                    <input wire:model="estatus" type="text" class="form-control" placeholder="$ Estatus $">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Entregado A---</span>
                    <input wire:model="entregado" type="text" class="form-control" placeholder="Entregado A">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---A Meses---</span>
                    <input wire:model="a_meses" type="text" class="form-control" placeholder="A Meses">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Fecha Facturación---</span>
                    <input wire:model="fecha_facturacion" type="text" class="form-control" placeholder="Fecha Facturación">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Comentario---</span>
                    <input wire:model="comentario" type="text" class="form-control" placeholder="Comentario">
                </th>
                <th class="px-1 py-1">
                    <span class="invisible">---Comprobante---</span>
                    <input wire:model="comprobante" type="text" class="form-control" placeholder="Comprobante">
                </th>
                <th class="th-azul">Fecha Actualización</th>

                @can('finanzas.acciones')
                    <th class="th-azul">Acciones</th>
                @endcan
                
                <th class="th-azul">Acc. Especiales</th>
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
                <td> <span class="colapso">{{ $item->fam_cat}}</span></td>
                <td ><span class="colapso">{{ $item->razon_social }}</span></td>
                <td><span class="colapso">{{ $item->proyecto }}</span></td>
                <td><span title="{{ $item->descripcion }}" class="colapso">{{ $item->descripcion }}</span></td>
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
                <td>{{ $item->metodo_pago }}</td>
                <td>
                    @if ($item->es_pagado == 'Pagado')
                    <p class="badge bg-success">Pagado</p>
                    @else
                        <p class="badge bg-danger">Pendiente</p>
                    @endif
                </td>
                <td>{{ $item->entregado }}</td>
                <td><span class="colapso">{{ $item->a_meses }}</span></td>
                <td>{{ $item->fecha_facturacion }}</td>
                <td><span class="colapso">{{ $item->comentario }}</span></td>
                <td>
                    @if ($item->comprobante == 'Enviado')
                        <p class="badge bg-success">Enviado</p>
                    @else  
                        <p class="badge bg-danger">Sin Enviar</p>
                    @endif
                </td>
                
                <td>
                    {{ $item->usuario_edito }}  
                    <br> 
                    {{ $item->updated_at }}
                </td>
                @can('finanzas.acciones')
                    <td>
                        <span class="completo">
                            <form action="{{ route('finanzas.destroy',$item->id) }}" method="POST">
                                    <a class="btn btn-sm btn-primary " href="{{ route('finanzas.show',$item->id) }}" title="Mostrar"><i class="fa fa-fw fa-eye"></i></a>
                                    @if ($item->a_meses!='N/A')
                                        <a class="btn btn-sm btn-success" href="{{ route('finanzas.editEgresoMeses',$item->id) }}" title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                                    @elseif($item->salidas_id)
                                        <a class="btn btn-sm btn-success" href="{{ route('finanzas.editEgreso',$item->id) }}" title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                                    @else
                                        <a class="btn btn-sm btn-success" href="{{ route('finanzas.editIngreso',$item->id) }}" title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                                    @endif
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm show_confirm" title="Eliminar"><i class="fa fa-fw fa-trash"></i></button>
                            </form>
                        </span>
                    </td>
                @endcan
                <td>
                    @can('finanzas.confirmarpago')
                        <a class="btn btn-sm btn-info" href="{{ route('finanzas.confirmarPago',$item->id) }}" title="Actualizar Pago"><i class="fas fa-credit-card"></i></a>      
                    @endcan
                    @if ($item->salidas_id)
                        @can('finanzas.correo')
                            <a class="btn btn-sm btn-secondary " href="{{ route('finanzas.correo',$item->id) }}" title="Correo"><i class="fas fa-envelope"></i></a>      
                        @endcan
                    @endif
                    @can('facturas.index')    
                        <a class="btn btn-sm btn-warning" href="{{ route('facturas.facturafinanzas', ['id' => $item->id]) }}" title="Factura"><i class="fas fa-file-invoice"></i></a>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $finanzas->links() !!}
</div>