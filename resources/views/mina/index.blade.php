@extends('adminlte::page')
@section('title','Minas')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Minas') }}
                            </span>

                             <div class="float-right">
                                @can('minas.acciones')
                                    <a href="{{ route('minas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Nueva Mina') }}
                                    </a>
                                @endcan
                              </div>
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
                                        <th>Abreviación</th>
										<th>Fecha Actualización</th>
                                        @can('minas.acciones')
                                            <th>Acciones</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($minas as $mina)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $mina->nombre }}</td>
											<td>{{ $mina->descripcion }}</td>
                                            <td>{{ $mina->abreviacion }}</td>
											<td><span class="peque">{{ $mina->usuario_edito }}</span>  <br/> <span class="peque">{{ $mina->updated_at }}</span> </td>

                                            @can('minas.acciones')
                                            <td>
                                                <form action="{{ route('minas.destroy',$mina->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('minas.show',$mina->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('minas.edit',$mina->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
            </div>
        </div>
    </div>    
@endsection