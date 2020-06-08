@extends('layouts.admin')

@section('title','Dashboard')
@section('page','Dashboard')

@section('content')
{{-- CARD TOP --}}
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Total Pendaftar</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalRegister}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-secondary"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Total Diterima</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalDiterima}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user-graduate fa-2x text-success"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Total Laki-Laki</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalMale}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-mars fa-2x text-info"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Total Perempuan</div>
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$totalFemale}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-venus fa-2x text-danger"></i>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Latest News --}}
<div class="col-lg-8">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Total Pendaftar Berdasarkan Wilayah</h6>
        </div>
        <div class="card-body">
            <div class="chart-bar">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="pendaftar_wilayah" style="display: block; width: 673px; height: 320px;" width="673"
                    height="320" class="chartjs-render-monitor"></canvas>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>

        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        var ctx = document.getElementById("pendaftar_wilayah");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                            @foreach ($totalPendaftarWilayah as $zona)
                                {!! '"'. $zona->kelurahan .'",' !!}
                            @endforeach
                        ],
                datasets: [{
                    label: "Pendaftar",
                    backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",
                    data: [
                        @foreach ($totalPendaftarWilayah as $zona)
                                {!! $zona->total .',' !!}
                        @endforeach
                    ],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{

                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: {{ $totalPendaftarWilayah[0]->total }},
                            maxTicksLimit: 5,
                            padding: 10,
                            stepSize: 1
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function (tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ' : ' + tooltipItem.yLabel;
                        }
                    }
                },
            }
        });

    </script>
@endpush
