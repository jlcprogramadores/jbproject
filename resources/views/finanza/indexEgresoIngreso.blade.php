@extends('adminlte::page')
@if ($esEgreso)
    @section('title','Egresos')
@else
@section('title','Ingresos')
@endif

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ $nombre }}
                            </span>

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped display compact" id="table"  style="width:100%">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
										<th>Fecha Entrada</th>
                                        @if ($esEgreso)
										    <th>Fecha Salida</th>
                                        @endif
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
                                        @if (!$esEgreso)
                                            <th>Fecha Facturacion</th>
                                        @endif
										<th>Comentario</th>
                                        @if ($esEgreso)
                                            <th>Comprobante</th>
                                        @endif
                                        <th>Fecha Actualización</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($finanzas as $finanza)
                                        <tr>

                                            <td>{{ $finanza->no }}</td>
											<td>
                                                @if ($finanza->esta_atrasado)
                                                    <span class="text-danger">
                                                        {{ $finanza->fecha_entrada ? Carbon\Carbon::parse($finanza->fecha_entrada)->format('Y-m-d') : '' }}
                                                    </span>
                                                    <br>
                                                    <span class="peque text-danger">
                                                        Atrasada
                                                    </span>
                                                @else
                                                    {{ $finanza->fecha_entrada ? Carbon\Carbon::parse($finanza->fecha_entrada)->format('Y-m-d') : '' }}
                                                    
                                                @endif
                                            
                                            </td>
                                            @if ($esEgreso)
											    <td>{{ $finanza->fecha_salida ? Carbon\Carbon::parse($finanza->fecha_salida)->format('Y-m-d') : '' }}</td>
                                            @endif
                                            <td>{{ $finanza->vence }}</td>
											<td>{{ $dias = Carbon\Carbon::parse( strtotime($finanza->fecha_salida."+ ".$finanza->vence." days"))->format('Y-m-d') }}</td>
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
                                            <?php $tipoFinanza = $finanza->salidas_id ?  'Egreso' : 'Ingreso' ?>
											<td>{{ $tipoFinanza }}</td>
                                            <?php 
                                                $fam = 'F: '.$finanza->famCategoria->familia->nombre;
                                                $cat = 'C: '.$finanza->famCategoria->nombre;
                                                ?>
											<td> <span style=" white-space: nowrap">{{ $fam }}</span> <br/> <span style=" white-space: nowrap">{{ $cat }}</span>    </td>
                                            <td>{{ $finanza->salidas_id ? $finanza->salida->proveedore->razon_social : $finanza->entrada->cliente->razon_social }}</td>
                                            <td>{{ $finanza->proyecto->nombre }}</td>
											<td>{{ $finanza->descripcion }}</td>
                                            <td>
                                                @if (!empty($finanza->factura[0]))
                                                 @foreach($finanza->factura as $iterFactura)
                                                    {{$iterFactura->referencia_factura}}
                                                    /
                                                        
                                                    @endforeach
                                                @else
                                                    <p class="badge bg-danger">No facturado</p>
                                                @endif

                                            </td>
                                            <td>{{$finanza->salidas_id ? $finanza->salida->proveedore->nombre : $finanza->entrada->cliente->nombre}}</td>
											<td>{{ $finanza->cantidad.' '.$finanza->unidad->nombre }}</td>
											<td>{{ '$'. number_format($finanza->costo_unitario,2) }}</td>
                                            <td>{{  '$'. number_format($subTotal = $finanza->costo_unitario*$finanza->cantidad,2) }}</td>
											<td>{{ ($iva = $finanza->iva->porcentaje).'%' }}</td>
                                            <td>{{ '$'. number_format($subTotal*$iva,2) }}</td>
											<td>{{ '$'. number_format($montoAPagar = $finanza->monto_a_pagar,2) }}</td>
											<td >{{$finanza->fecha_de_pago ? Carbon\Carbon::parse($finanza->fecha_de_pago)->format('Y-m-d') : ''}}</td>
											<td>{{ $finanza->metodo_de_pago }}</td>
                                            @if ($finanza->es_pagado == 0)
                                                <td><p class="badge bg-danger">Pendiente Pagar</p></td>
                                            @else
                                                <td><p class="badge bg-success">Pagado</p></td>
                                            @endif
											<td>{{ $finanza->entregado_material_a }}</td>
                                            {{-- Parte de los meses --}}
                                            {{-- motrar cuantos se han pagado y motrar el valor menos el total --}}
                                            <td>
                                                @if (!empty($finanza->a_meses))
                                                    <?php 
                                                        $cuantosMeses = 0;
                                                        $totalPagado = 0;
                                                        if(!empty($finanza->factura[0])){
                                                            foreach ($finanza->factura as $iterFactura) {
                                                                if (!is_null($iterFactura->monto) && $iterFactura->monto != 0  ) {
                                                                    $cuantosMeses++;
                                                                    $totalPagado = $totalPagado + $iterFactura->monto; 
                                                                }
                                                            }
                                                        }
                                                        $resta = $finanza->monto_a_pagar - $totalPagado
                                                        
                                                    ?> 
                                                    {{ $cuantosMeses.' de '.$finanza->a_meses}}
                                                    <br>
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
                                            @if (!$esEgreso)
                                                <td>{{ $finanza->fecha_facturacion ?  Carbon\Carbon::parse($finanza->fecha_facturacion)->format('Y-m-d') :'' }}</td>
                                            @endif
                                            <td>{{ $finanza->comentario }}</td>
                                            @if ($esEgreso)
                                                @if ($finanza->salidas_id)
                                                    @if ($finanza->salida->enviado == 0)
                                                        <td><p class="badge bg-danger">Sin Enviar</p></td>
                                                    @else
                                                        <td><p class="badge bg-success">Enviado</p></td>
                                                    @endif
                                                @else  
                                                    <td></td>
                                                @endif
                                            @endif
                                            <td><span class="peque">{{ $finanza->usuario_edito }}</span>  <br/> <span class="peque">{{ $finanza->updated_at }}</span></td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $finanzas->links() !!}
            </div>
        </div>
    </div>
@endsection