@extends('admin.template.app')

@section('title')
    dashboard
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3>Penjualan</h3>
                </div>
                <div class="card-body">
                    <div id="chart"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                        <div class="avatar flex-shrink-0">
                            <img src="{{ asset('backoffice/img/icons/unicons/chart-success.png') }}" alt="chart success"
                                class="rounded">
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="{{ route('barang.index') }}">Lebih lengkap</a>
                            </div>
                        </div>
                    </div>
                    <h3 class="card-title mb-2">Barang terdaftar</h3>
                    <span class="fw-semibold fs-5 d-block mb-1"> {{ $barang }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                        <div class="avatar flex-shrink-0">
                            <img src="{{ asset('backoffice/img/icons/unicons/chart.png') }}" alt="chart" class="rounded">
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="{{ route('satuan.index') }}">Lebih lengkap</a>
                            </div>
                        </div>
                    </div>
                    <h3 class="card-title mb-2">Satuan terdaftar</h3>
                    <span class="fw-semibold fs-5 d-block mb-1">{{ $satuan }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                        <div class="avatar flex-shrink-0">
                            <img src="{{ asset('backoffice/img/icons/unicons/paypal.png') }}" alt="paypal"
                                class="rounded">
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="{{ route('kategori.index') }}">Lebih lengkap</a>
                            </div>
                        </div>
                    </div>
                    <h3 class="card-title mb-2">Kategori terdaftar</h3>
                    <span class="fw-semibold fs-5 d-block mb-1">{{ $kategori }}</span>
                </div>
            </div>
        </div>
        <input type="hidden" id="penjualan" value="{{ json_encode($penjualan_per_month) }}">
    </div>


    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        console.log(document.getElementById('penjualan').value);
        var options = {
            series: [{
                name: 'Total Penjualan',
                data: JSON.parse(document.getElementById('penjualan').value)
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
            },
            yaxis: {},
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endsection
