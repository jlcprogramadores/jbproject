@extends('adminlte::page')
@section('title','Iva')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('IVA') }}
                            </span>
                            @can('ivas.acciones')
                                <div class="float-right">
                                    <a href="{{ route('ivas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear IVA') }}
                                    </a>
                                </div>
                            @endcan
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
                                        
										<th>Porcentaje</th>
										<th>Descripción</th>
                                        <th>Actualización</th>
                                        @can('ivas.acciones')
                                            <th>Acciones</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ivas as $iva)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $iva->porcentaje }}%</td>
											<td>{{ $iva->descripcion }}</td>
                                            <td><span class="peque">{{ $iva->usuario_edito }}</span>  <br/> <span class="peque">{{ $iva->updated_at }}</span></td>
                                            @can('ivas.acciones')    
                                                <td>
                                                    <form action="{{ route('ivas.destroy',$iva->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " href="{{ route('ivas.show',$iva->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('ivas.edit',$iva->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
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
                {!! $ivas->links() !!}
            </div>
        </div>
    </div>
@endsection
