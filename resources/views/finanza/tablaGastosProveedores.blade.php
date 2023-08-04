@extends('adminlte::page')
@section('title','Gastos de Proovedores')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ 'Gastos de Proyecto '.$nombre }}
                            </span>
                              <div class="float-right">
                                <a href="javascript:history.back()" class="btn btn-light btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Atrás') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped display compact" id="table"  style="width:100%">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
										<th>Fecha Entrada</th>
										<th>Fecha Salida</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($finanzas as $finanza)
                                        <tr>

                                            <td>{{ $finanza->no }}</td>
                                            <td>{{ $finanza->no }}</td>
                                            <td>{{ $finanza->no }}</td>
											
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $finanzas->links() !!}
            </div>
        </div>
    </div>
@endsection