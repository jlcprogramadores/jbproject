@extends('layouts.app')

@section('template_title')
    Familia
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Familia') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('familias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nueva Familia') }}
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
										<th>Descripcion</th>
										<th>Es Activo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($familias as $familia)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $familia->nombre }}</td>
											<td>{{ $familia->descripcion }}</td>
											<td>{{ $familia->es_activo }}</td>

                                            <td>
                                                <form action="{{ route('familias.destroy',$familia->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('familias.show',$familia->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('familias.edit',$familia->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                </form>
                                            </td>
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
