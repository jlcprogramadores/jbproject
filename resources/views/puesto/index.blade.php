@extends('adminlte::page')
@section('title','Puestos')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Puestos') }}
                            </span>
                             <div class="float-right">
                                @can('puestos.acciones')
                                <a href="{{ route('puestos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Puesto') }}
                                </a>
                                @endcan
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('danger'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre del Puesto</th>
										<th>Fecha Actualización</th>
                                        
                                        @can('puestos.acciones')
                                        <th></th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($puestos as $puesto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $puesto->nombre }}</td>
											<td>{{ $puesto->usuario_edito }} <br/> {{ $puesto->updated_at }}</td>
                                            @can('puestos.acciones')
                                            <td>
                                                <form action="{{ route('puestos.destroy',$puesto->id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('puestos.show',$puesto->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a> --}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('puestos.edit',$puesto->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $puestos->links() !!}
            </div>
        </div>
    </div>
@endsection
