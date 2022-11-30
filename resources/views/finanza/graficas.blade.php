@extends('layouts.app')

@section('title', 'Gráfica Ingresos vs Egresos')
@if (Auth::check() && Auth::user()->es_activo)
    @section('content')
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <div style="display: block">
                                <canvas id="myChart" width="600" height="700"></canvas>
                            </div>

                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <script>
                                const ctx = document.getElementById('myChart');

                                new Chart(ctx, {
                                    type: 'pie',
                                    data: {
                                        labels: ['Ingresos', 'Egresos'],
                                        datasets: [{
                                            label: 'Total',
                                            data: [{{$ingresos}}, {{$egresos}}]
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
