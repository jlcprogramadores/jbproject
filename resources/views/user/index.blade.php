@extends('layouts.app')

@section('title','Usuarios')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection
@if(Auth::check() && Auth::user()->es_activo)
@can('usuarios.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-white border-secondary">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Usuarios') }}
                            </span>
                            <div class="float-right">
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
										<th>Email</th>
                                        <th>Es Activo</th>
                                        <th>Roles</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $user->name }}</td>
											<td>{{ $user->email }}</td>
                                            @if ($user->es_activo)
                                                <td><p class="badge bg-success">Activado</p></td>
                                            @else
                                                <td><p class="badge bg-danger">Innactivo</p></td>
                                            @endif
                                            {{-- <td>{{$user->roles}}</td> --}}
                                            @if (isset($user->roles[0]))
                                            <?php
                                                $iter = 0;
                                                $rolecito = '';
                                            ?>
                                            @foreach($user->roles as $rol)
                                                <?php
                                                    if ($iter == 0) {
                                                        $rolecito = $rolecito . $rol->name;
                                                    }else{
                                                        $rolecito = $rolecito . ', ';
                                                        $rolecito = $rolecito . $rol->name;
                                                    }
                                                    $iter ++;
                                                ?>
                                                @endforeach
                                                <td>{{$rolecito}}</td>
                                            @else
                                                <td>Sin Rol</td>
                                            @endif
                                            <td>
                                                <form action="{{ route('usuarios.destroy',$user->id) }}" method="POST">
                                                    @can('usuarios.show')
                                                    <a class="btn btn-sm btn-primary " href="{{ route('usuarios.show',$user->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    @endcan
                                                    @can('usuarios.edit')
                                                    <a class="btn btn-sm btn-success" href="{{ route('usuarios.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>    
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('usuarios.destroy')    
                                                    <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
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
                {!! $users->links() !!}
            </div>
        </div>
    </div>
@endsection
@endcan
@endif