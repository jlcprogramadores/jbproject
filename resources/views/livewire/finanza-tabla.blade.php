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
                <td>{{ $item->no }}</td>
                <td>
                    @if ($item->esta_atrasado)
                        <span class="text-danger">
                            {{ $item->fecha_entrada ? Carbon\Carbon::parse($item->fecha_entrada)->format('Y-m-d') : '' }}
                        </span>
                        <br>
                        <span class="peque text-danger">
                            Atrasada
                        </span>
                    @else
                        {{ $item->fecha_entrada ? Carbon\Carbon::parse($item->fecha_entrada)->format('Y-m-d') : '' }}
                        
                    @endif
                
                </td>
                <td>{{ $item->fecha_salida ? Carbon\Carbon::parse($item->fecha_salida)->format('Y-m-d') : '' }}</td>
                <td>{{ $item->vence }}</td>
                <td>{{ $dias = Carbon\Carbon::parse( strtotime($item->fecha_salida."+ ".$item->vence." days"))->format('Y-m-d') }}</td>
                <?php 
                    $fechaActual = Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
                    $shippingDate = Carbon\Carbon::createFromFormat('Y-m-d', $dias);
                    $diferencia_en_dias = $fechaActual->diffInDays($shippingDate);
                    ?>
                <td>{{ $diferencia_en_dias }}</td>
                @if ($diferencia_en_dias <= 0)
                <td><p class="badge bg-danger">Vencido</p></td>
                @else
                <td><p class="badge bg-warning text-dark">Por vencer</p></td>
                @endif
                <?php $tipoFinanza = $item->salidas_id ?  'Egreso' : 'Ingreso' ?>
                <td>{{ $tipoFinanza }}</td>
                <?php 
                    $fam = 'F: '.$item->famCategoria->familia->nombre;
                    $cat = 'C: '.$item->famCategoria->nombre;
                ?>
                <td> <span style=" white-space: nowrap">{{ $fam }}</span> <br/> <span style=" white-space: nowrap">{{ $cat }}</span>    </td>
                <td>{{ $item->salidas_id ? $item->salida->proveedore->razon_social : $item->entrada->cliente->razon_social }}</td>
                <td>{{ $item->proyecto->nombre }}</td>
                <td>{{ $item->descripcion }}</td>
                <td>
                    @if (!empty($item->factura[0]))
                     @foreach($item->factura as $iterFactura)

                        {{$iterFactura->referencia_factura ? $iterFactura->referencia_factura.',' : '' }}
                        
                            
                        @endforeach
                    @else
                        @if ($item->salidas_id)
                            <p class="badge bg-danger">No facturado</p>
                        @else
                            <p class="badge bg-danger">No Recibida</p>
                        @endif
                    @endif

                </td>
                <td>{{$item->salidas_id ? $item->salida->proveedore->nombre : $item->entrada->cliente->nombre}}</td>
                <td>{{ $item->cantidad.' '.$item->unidad->nombre }}</td>
                <td>{{ '$'. number_format($item->costo_unitario,2) }}</td>
                <td>{{  '$'. number_format($subTotal = $item->costo_unitario*$item->cantidad,2) }}</td>
                <td>{{ ($iva = $item->iva->porcentaje).'%' }}</td>
                <td>{{ '$'. number_format($subTotal*$iva,2) }}</td>
                <td>{{ '$'. number_format($montoAPagar = $item->monto_a_pagar,2) }}</td>
                <td >{{$item->fecha_de_pago ? Carbon\Carbon::parse($item->fecha_de_pago)->format('Y-m-d') : ''}}</td>
                <td>{{ $item->metodo_de_pago }}</td>
                @if ($item->es_pagado == 0)
                    <td><p class="badge bg-danger">Pendiente Pagar</p></td>
                @else
                    <td><p class="badge bg-success">Pagado</p></td>
                @endif
                <td>{{ $item->entregado_material_a }}</td>
                {{-- Parte de los meses --}}
                {{-- motrar cuantos se han pagado y motrar el valor menos el total --}}
                <td>
                    <?php 
                        // $hayProximo = false;
                        $totalPagado = 0;    
                    ?>
                    @if (!empty($item->a_meses))
                        @foreach ($item->factura as $item)
                        <span class="completo text-capitalize">
                            <?php 
                                $mes_pago = carbon\Carbon::parse($item->mes_de_pago)
                            ?>
                            @if ($mes_pago->monthName == $fechaActual->monthName && $mes_pago->year == $fechaActual->year )
                                @if (!is_null($item->monto) && $item->monto != 0)
                                    {{ $mes_pago->monthName }}
                                    <span class="badge bg-success">
                                        Pagado
                                    </span>
                                    <br>
                                    <?php $totalPagado = $totalPagado + $item->monto; ?> 
                                @else
                                    {{ $mes_pago->monthName }}
                                    <span class="badge bg-warning text-dark">
                                        Por Vencer
                                    </span>
                                    <br>
                                @endif
                            @elseif($mes_pago < $fechaActual )
                                @if (!is_null($item->monto) && $item->monto != 0)
                                   
                                @else
                                    {{ $mes_pago->monthName }}
                                    <span class="badge bg-danger">
                                        Vencido
                                    </span>
                                    <br>
                                @endif
                            @else
                                {{-- php $hayProximo = true   --}}
                            @endif
                            
                        </span>
                        @endforeach
                            {{-- @if ($hayProximo)
                                <span class="badge bg-secondary">
                                    
                                </span>
                                <br>
                            @endif --}}
                        <?php $resta = $item->monto_a_pagar - $totalPagado ?> 
                        <span class="peque">
                            @if ($resta <= 0)
                                Pagado
                            @else
                                {{ 'Resta: $'. number_format($resta,2)  }}
                            @endif
                        </span>
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ $item->fecha_facturacion ?  Carbon\Carbon::parse($item->fecha_facturacion)->format('Y-m-d') :'' }}</td>
                <td>{{ $item->comentario }}</td>
                @if ($item->salidas_id)
                    @if ($item->salida->enviado == 0)
                        <td><p class="badge bg-danger">Sin Enviar</p></td>
                    @else
                        <td><p class="badge bg-success">Enviado</p></td>
                    @endif
                @else  
                    <td></td>
                @endif
                
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