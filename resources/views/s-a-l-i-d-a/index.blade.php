@extends('layouts.app')

@section('template_title')
    S A L I D A
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('S A L I D A') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('s-a-l-i-d-a-s.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Proveedor Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sALIDAS as $sALIDA)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $sALIDA->proveedor_id }}</td>

                                            <td>
                                                <form action="{{ route('s-a-l-i-d-a-s.destroy',$sALIDA->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('s-a-l-i-d-a-s.show',$sALIDA->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('s-a-l-i-d-a-s.edit',$sALIDA->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $sALIDAS->links() !!}
            </div>
        </div>
    </div>
@endsection
