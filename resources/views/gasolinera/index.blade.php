@extends('adminlte::page')
@section('title','Gasolineras')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Gasolinera') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('gasolineras.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Gasolinera') }}
                                </a>
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
										<th>Nombre</th>
                                        <th>Fecha Actualización</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gasolineras as $gasolinera)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $gasolinera->nombre }}</td>
                                            <td><span class="peque">{{ $gasolinera->usuario_edito }}</span>  <br/> <span class="peque">{{ $gasolinera->updated_at }}</span></td>

                                            <td>
                                                <form action="{{ route('gasolineras.destroy',$gasolinera->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('gasolineras.show',$gasolinera->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('gasolineras.edit',$gasolinera->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $gasolineras->links() !!}
            </div>
        </div>
    </div>
@endsection
