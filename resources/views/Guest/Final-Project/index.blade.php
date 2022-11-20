@extends('layouts.guest')

@section('content')
<section>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ url()->current() }}
                    <div id="chart" style="height: 70vh"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('chart', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Statistik Pengajuan Judul PA Tahun 2022'
            },
            xAxis: {
                categories: {!! json_encode($categories) !!},
                accessibility: {
                    description: 'Months of the year'
                }
            },
            yAxis: {
                title: {
                    text: 'Total'
                },
                labels: {
                    formatter: function () {
                        return this.value;
                    }
                }
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                name: 'Pengajuan Judul PA',
                marker: {
                    symbol: 'square'
                },
                data: {!! json_encode($data) !!}

            }]
        });
    </script>
@endsection
