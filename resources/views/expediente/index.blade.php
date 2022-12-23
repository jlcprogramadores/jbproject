@extends('layouts.app')

@section('template_title')
    Expediente
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Expediente') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('expedientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Es Multiple</th>
										<th>Usuario Edito</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expedientes as $expediente)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $expediente->nombre }}</td>
											<td>{{ $expediente->es_multiple }}</td>
											<td>{{ $expediente->usuario_edito }}</td>

                                            <td>
                                                <form action="{{ route('expedientes.destroy',$expediente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('expedientes.show',$expediente->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('expedientes.edit',$expediente->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $expedientes->links() !!}
            </div>
        </div>
    </div>
@endsection
