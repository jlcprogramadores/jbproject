@extends('adminlte::page')
@section('title','Unidades')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Unidades') }}
                            </span>
                            @can('unidades.acciones')
                                <div class="float-right">
                                    <a href="{{ route('unidades.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Unidad') }}
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
										<th>Abreviación</th>
										<th>Descripción</th>
                                        <th>Actualización</th>
                                        <th>Acciones</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($unidades as $unidade)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $unidade->nombre }}</td>
											<td>{{ $unidade->descripcion }} </td>
                                            <td><span class="peque">{{ $unidade->usuario_edito }}</span>  <br/> <span class="peque">{{ $unidade->updated_at }}</span></td>
                                            <td>
                                                <form action="{{ route('unidades.destroy',$unidade->id) }}" method="POST">
                                                    @can('unidades.acciones')
                                                    <a class="btn btn-sm btn-primary " href="{{ route('unidades.show',$unidade->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('unidades.edit',$unidade->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i></button>
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
                {!! $unidades->links() !!}
            </div>
        </div>
    </div>
@endsection
