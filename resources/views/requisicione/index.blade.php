@extends('adminlte::page')
@section('title','Proveedores')

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">

                                <span id="card_title">
                                    {{ __('Requisiciones') }}
                                </span>

                                <div class="float-right">
                                    <a href="{{ route('requisiciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Requisición') }}
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
                                            
                                            <th>Folio</th>
                                            <th>Departamento</th>
                                            <th>Proyecto</th>
                                            <th>Justificación</th>
                                            <th>Archivo</th>
                                            <th>Esta Aprobada</th>
                                            <th>Aprobada Por</th>
                                            <th>Aprobada En</th>
                                            <th>Usuario Edito</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($requisiciones as $requisicione)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                
                                                <td>{{ $requisicione->folio }}</td>
                                                <td>{{ $requisicione->departamento }}</td>
                                                <td>{{ $requisicione->proyecto }}</td>
                                                <td>{{ $requisicione->justificacion }}</td>
                                                @if ($requisicione->archivo)
                                                <td><a href="{{$requisicione->archivo}}">Link de Archivo</a></td>
                                                @else
                                                    <td><span class="badge bg-danger">Sin Archivo</span></td>
                                                @endif 
                                                <td>{{ $requisicione->esta_aprobada }}</td>
                                                <td>{{ $requisicione->aprobada_por }}</td>
                                                <td>{{ $requisicione->aprobada_en }}</td> 
                                                <td>{{ $requisicione->usuario_edito }}</td>

                                                <td>
                                                    <form action="{{ route('requisiciones.destroy',$requisicione->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " href="{{ route('requisiciones.show',$requisicione->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('requisiciones.edit',$requisicione->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                    {!! $requisiciones->links() !!}
                </div>
            </div>
        </div>
@endsection
