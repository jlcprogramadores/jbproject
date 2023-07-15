@extends('adminlte::page')
@section('title','Archivos')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Archivo') }}
                            </span>

                             <div class="float-right">
                                @can('archivos.acciones')
                                    <a href="{{ route('files.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Subir Archivo') }}
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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Url</th>
										{{-- <th>Usuario Edito</th> --}}
                                        @can('archivos.acciones')
                                            <th>Acciones</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($archivos as $archivo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $archivo->nombre }}</td>
                                            <td><a href="{{$archivo->url}}">Link de Descarga</a></td>
											{{-- <td>{{ $archivo->usuario_edito }}</td> --}}

                                            <td>
                                                <form action="{{ route('archivos.destroy',$archivo->id) }}" method="POST">
                                                    @can('archivos.acciones')
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
                {!! $archivos->links() !!}
            </div>
        </div>
    </div>
    @endsection