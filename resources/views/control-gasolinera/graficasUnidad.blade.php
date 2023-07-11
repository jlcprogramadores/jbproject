@extends('adminlte::page')

@section('title', 'Costos Gasolinera Unidad')
@if (Auth::check() && Auth::user()->es_activo)
    @section('content')
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-secondary">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <h5 class="card-title">Gasolinera: {{$nombreGasolinera}}</h5>
                                    <h6>{{'Total gastado: ('.$desde.' a '.$hasta . ') = ' . '$'. number_format($gasto_general,2) }}</h6>
                                    

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
    
                            {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
                            <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"></script>

                            <script>
                                var destino = <?php echo json_encode($destino); ?>;
                                var gasto_total = <?php echo json_encode($gasto_total); ?>;
                                var totalVar = <?php echo json_encode('Total gastado: ('.$desde.' a '.$hasta . ') = ' . '$'. number_format($gasto_general,2))?>;
                                Chart.register(ChartDataLabels);
                                const ctx = document.getElementById('myChart').getContext('2d');
                                const myChart = new Chart(ctx, {
                                    type: 'pie',
                                    data: {
                                        labels: destino,
                                        datasets: [{
                                            // label: 'Costo Total:$',
                                            data: gasto_total,
                                            backgroundColor: [
                                                'rgba(220,20,60, 0.8)',
                                                'rgba(255,105,180, 0.8)',
                                                'rgba(152,251,152, 0.8)',
                                                'rgba(255,215,0,0.8)',
                                                'rgba(75, 192, 192, 0.8)',
                                                'rgba(180, 192, 192, 0.8)',
                                                'rgba(255,140,0, 0.8)',
                                                'rgba(176,196,222)',
                                                'rgba(218,112,214,0.8)',
                                                'rgba(240,248,255,0.8)',
                                                'rgba(165,42,42,0.8)',
                                                'rgba(25,25,112,0.8)',
                                            ],
                                            borderColor: [
                                                'rgba(220,20,60, 0.8)',
                                                'rgba(255,105,180, 0.8)',
                                                'rgba(152,251,152, 0.8)',
                                                'rgba(255,215,0,0.8)',
                                                'rgba(75, 192, 192, 0.8)',
                                                'rgba(180, 192, 192, 0.8)',
                                                'rgba(255,140,0, 0.8)',
                                                'rgba(176,196,222)',
                                                'rgba(218,112,214,0.8)',
                                                'rgba(240,248,255,0.8)',
                                                'rgba(165,42,42,0.8)',
                                                'rgba(25,25,112,0.8)',
                                            ],
                                            borderWidth: 2
                                        }]
                                    },
                                    options: {
                                    maintainAspectRatio: false,
                                    responsive: true,
                                    scales: {
                                        y: {
                                        beginAtZero: true,
                                        max: 100
                                        }
                                    },
                                    plugins: {
                                        legend: {
                                        "position": "left",
                                    },
                                        title: {
                                        // display: true,
                                        text: totalVar,
                                    },
                                        datalabels: {
                                        color: '#fff',
                                        backgroundColor: '#0000005b',
                                        borderWidth: 1,
                                        anchor: 'end',
                                        align: 'top',
                                        formatter: Math.round,
                                            font: {
                                                weight: 'bold',
                                                size: 13
                                            }
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