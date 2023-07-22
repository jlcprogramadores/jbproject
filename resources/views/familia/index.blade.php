@extends('adminlte::page')
@section('title','Familias')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Familias') }}
                            </span>
                            @can('familias.acciones')
                                <div class="float-right">
                                    <a href="{{ route('familias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Familia') }}
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
                                        @can('familias.acciones')
                                            <th>Acciones</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($familias as $familia)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $familia->nombre }}</td>
											<td>{{ $familia->descripcion }}</td>
                                            <td><span class="peque">{{ $familia->usuario_edito }}</span>  <br/> <span class="peque">{{ $familia->updated_at }}</span></td>   
                                            @can('familias.acciones')
                                                <td>
                                                    <form action="{{ route('familias.destroy',$familia->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " href="{{ route('familias.show',$familia->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('familias.edit',$familia->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $familias->links() !!}
            </div>
        </div>
    </div>
@endsection
