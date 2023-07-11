@extends('adminlte::page')

@section('title', 'Top General')
        @section('content')
            <section class="content container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <span class="card-title">Top General</span>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('finanzas.top') }}" role="form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="container">
                                        <div class="row">

                                            <div class="col-sm p-1 form-group ">
                                                <label for="numRegistros">Número de registros:</label>
                                                <br>
                                                <input id="numRegistros" type="number" name="numRegistros" class="form-control" placeholder="Cuantos registros quieres" required>
                                            </div>
                                            <div class="col-sm p-1 form-group ">

                                                <label for="hasta">Top:</label>
                                                <br>
                                                <select name="tipoFinanza" id="tipoFinanza" class="form-control">
                                                    <option value="0">Egresos</option>
                                                    <option value="1">Ingresos</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row justify-content-md-center">
                                            <button id="btn_graficar" type="submit"
                                                class="btn btn-primary col col-lg-3">Mostrar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endsection
