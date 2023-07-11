@extends('adminlte::page')
@section('title','Facturas')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Facturas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('finanzas.index') }}" class="btn btn-light btn-sm float-right"  data-placement="left">
                                    {{ __('Atrás') }}
                                </a>
                                @can('facturas.create')
                                    @if (!$es_a_meses)
                                        <a href="{{ route('facturas.create',['finanza_id'=> $id, 'creado' => 1 ]) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                            {{ __('Crear Factura') }}
                                        </a>
                                    @endif
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
                                        @if ($es_a_meses)
										    <th>Mensualidad</th>
                                        @endif
										<th>Referencia Factura</th>
										<th>Link Factura</th>
										<th>Url</th>
                                        <th>Monto</th>
										<th>Fecha Creación</th>
										<th>Fecha Factura</th>
                                        <th>Actualización</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($facturas as $factura)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            @if ($es_a_meses)
										        <td>
                                                    {{$factura->comentario_pago}}
                                                    <br>
                                                    <span class="completo text-capitalize">
                                                        <?php 
                                                            $fechaActual = Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
                                                            $mes_pago = carbon\Carbon::parse($factura->mes_de_pago)
                                                        ?>
                                                    @if ($mes_pago->monthName == $fechaActual->monthName && $mes_pago->year == $fechaActual->year )
                                                       @if (!is_null($factura->monto) && $factura->monto != 0)
                                                           {{ $mes_pago->monthName }}
                                                           <span class="badge bg-success">
                                                               Pagado
                                                           </span>
                                                           <br>
                                                       @else
                                                           {{ $mes_pago->monthName }}
                                                           <span class="badge bg-warning text-dark">
                                                               Por Vencer
                                                           </span>
                                                           <br>
                                                       @endif
                                                   @elseif($mes_pago < $fechaActual )
                                                       @if (!is_null($factura->monto) && $factura->monto != 0)
                                                            {{ $mes_pago->monthName }}
                                                            <span class="badge bg-success">
                                                                Pagado
                                                            </span>
                                                            <br>
                                                       @else
                                                           {{ $mes_pago->monthName }}
                                                           <span class="badge bg-danger">
                                                               Vencido
                                                           </span>
                                                           <br>
                                                       @endif
                                                   @else
                                                        {{ $mes_pago->monthName }}
                                                       {{-- php $hayProximo = true   --}}
                                                   @endif
                                                    </span>
                                                </td>
                                            @endif
											<td>{{ $factura->referencia_factura }}</td>
                                            @if ($factura->factura_base64)
                                                <td><a href="{{$factura->factura_base64}}">Link Factura</a></td> 
                                            @else
                                                <td><span class="text-danger">Sin Link</span></td>
                                            @endif 
											<td>{{ $factura->url }}</td>
                                            <td>{{ '$'. number_format( $factura->monto,2) }}</td>
											<td>{{ $factura->fecha_creacion ? Carbon\Carbon::parse($factura->fecha_creacion)->format('d-m-Y') : '' }}</td>
											<td>{{ $factura->fecha_factura ? Carbon\Carbon::parse($factura->fecha_factura)->format('d-m-Y') : ''}}</td>
                                            <td><span class="peque">{{ $factura->usuario_edito }}</span>  <br/> <span class="peque">{{ $factura->updated_at }}</span></td>
                                            
                                            <td>
                                                <form action="{{ route('facturas.destroy',$factura->id) }}" method="POST">
                                                    @can('facturas.edit')    
                                                        <a class="btn btn-sm btn-success" href="{{ route('facturas.edit',$factura->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('facturas.destroy')
                                                        @if (!$es_a_meses)
                                                            <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i> Borrar</button>    
                                                        @endif
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
                {!! $facturas->links() !!}
            </div>
        </div>
    </div>
@endsection
