@extends('adminlte::page')
@section('title','Finanzas')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Finanzas') }}
                            </span>

                             <div class="float-right">
                                @can('finanzas.acciones')
                                <a href="{{ route('finanzas.egresoMeses') }}" class="btn btn-primary btn-sm p-2"  data-placement="left">
                                    {{ __('Crear Egresos A Meses') }}
                                </a> 
                                <a href="{{ route('finanzas.egreso') }}" class="btn btn-primary btn-sm p-2"  data-placement="left">
                                    {{ __('Crear Egresos') }}
                                </a> 
                                <a href="{{ route('finanzas.ingreso') }}" class="btn btn-primary btn-sm p-2"  data-placement="left">
                                    {{ __('Crear Ingresos') }}
                                </a>
                                @endcan
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
                            <livewire:finanza-tabla>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
