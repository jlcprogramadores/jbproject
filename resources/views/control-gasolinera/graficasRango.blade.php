@extends('layouts.app')

@section('title', 'Gráfica Costos Gasolinera')
@if (Auth::check() && Auth::user()->es_activo)
    @section('content')
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-white border-secondary">
                        <div class="card-header bg-secondary">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <h5 class="card-title">Gasolinera: {{$nombreGasolinera}}</h5>
                                    <h6>({{$desde.' - '.$hasta}})</h6>

                                </div>
                                <div class="float-right">
                                    <a href="javascript:history.back()" class="btn btn-light btn-sm float-right"  data-placement="left">
                                        {{ __('Atrás') }}
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div style="display: block">
                                <canvas id="myChart" width="600" height="700"></canvas>
                            </div>

                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <script>
                                const ctx = document.getElementById('myChart');
                                var fecha = <?php echo json_encode($fecha); ?>;
                                var gasto_total = <?php echo json_encode($gasto_total); ?>;
                                new Chart(ctx, {
                                    type: 'pie',
                                    data: {
                                        labels: fecha,
                                        datasets: [{
                                            label: 'Total:$',
                                            data: gasto_total
                                        }]
                                    },
                                    backgroundColor: [
                                        'rgb(255, 99, 132)',
                                        'rgb(255, 205, 86)',
                                    ],
                                    options: {
                                        maintainAspectRatio: false,
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
@endif