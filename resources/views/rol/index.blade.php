@extends('adminlte::page')

@section('title','Roles')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Roles') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Rol') }}
                                </a>
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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>                                
										<th>Nombre</th>
                                        @can('roles.acciones')
                                        <th>Acciones</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $rol)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $rol->name }}</td>
                                            @can('roles.acciones')
                                                <td>
                                                    <form action="{{ route('roles.destroy',$rol->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-success" href="{{ route('roles.edit',$rol->id) }}"><i class="fa fa-fw fa-edit"></i></a>    
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
                {!! $roles->links() !!}
            </div>
        </div>
    </div>
@endsection
