@extends('adminlte::page')
@section('title','Tipo De Ingreso')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tipo De Ingreso') }}
                            </span>
                            @can('tipo-de-ingresos.acciones')
                             <div class="float-right">
                                <a href="{{ route('tipo-de-ingresos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Tipo De Ingreso') }}
                                </a>
                              </div>
                            @endcan
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
                    @if ($message = Session::get('danger'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Descripción</th>
                                        <th>Actualización</th>
                                        @can('tipo-de-ingresos.acciones')
                                            <th>Acciones</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tipoDeIngresos as $tipoDeIngreso)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tipoDeIngreso->nombre }}</td>
											<td>{{ $tipoDeIngreso->descripcion }}</td>
                                            <td><span class="peque">{{ $tipoDeIngreso->usuario_edito }}</span>  <br/> <span class="peque">{{ $tipoDeIngreso->updated_at }}</span></td>
                                            @can('tipo-de-ingresos.acciones')
                                            <td>
                                                <form action="{{ route('tipo-de-ingresos.destroy',$tipoDeIngreso->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tipo-de-ingresos.show',$tipoDeIngreso->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tipo-de-ingresos.edit',$tipoDeIngreso->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i></button>
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
                {!! $tipoDeIngresos->links() !!}
            </div>
        </div>
    </div>
@endsection
