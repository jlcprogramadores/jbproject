@extends('adminlte::page')
@section('title','Proyectos')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Proyectos') }}
                            </span>
                            @can('proyectos.acciones')    
                            <div class="float-right">
                                <a href="{{ route('proyectos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Proyecto') }}
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
                                        
										<th>Nombre</th>
										<th>Descripción</th>
										<th>Número De Proyecto</th>
                                        <th>Presupuesto</th>
                                        <th>Margen</th>
                                        <th>Actualización</th>
                                        @can('proyectos.acciones')    
                                            <th>Acciones</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proyectos as $proyecto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            @if (isset($proyecto->mina->nombre))
											    <td>{{ $proyecto->nombre }} <br> Mina: {{ $proyecto->mina->nombre}}</td>
                                            @else
											    <td>{{ $proyecto->nombre }} <br> <span class="badge bg-danger">Sin Mina Asignada</span> </td>
                                            @endif
											<td>{{ $proyecto->descripcion }}</td>
											<td>{{ $proyecto->numero_de_proyecto }}</td>
                                            <td>{{ '$'. number_format($proyecto->presupuesto,2) }}</td>
                                            <td>{{ '$'. number_format($proyecto->margen,2) }}</td>
                                            <td><span class="peque">{{ $proyecto->usuario_edito }}</span>  <br/> <span class="peque">{{ $proyecto->updated_at }}</span></td>

                                            @can('proyectos.acciones')    
                                            <td>
                                                <form action="{{ route('proyectos.destroy',$proyecto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('proyectos.show',$proyecto->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('proyectos.edit',$proyecto->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>                                         
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
                {!! $proyectos->links() !!}
            </div>
        </div>
    </div>
@endsection
