@extends('layouts.app')

@section('title', 'Gráficas')
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
                                    type: 'bar',
                                    data: {
                                        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                        datasets: [{
                                            label: '# of Votes',
                                            data: [12, 19, 3, 5, 2, 3],
                                            borderWidth: 1
                                        }]
                                    },
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
