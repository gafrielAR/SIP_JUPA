@extends('layouts.guest')

@section('content')
<section>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ url()->current() }}
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Perbulan</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Pertahun</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                            <div id="chartByMonth" style="height: 70vh"></div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                            <div id="chartByYear" style="height: 70vh"></div>
                        </div>
                    </div>

                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Lecturer</th>
                                <th>Title</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($dataFinalProject as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->student->name }}</td>
                                    <td>{{ $row->stMentor->name }}</td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->final_project_status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('chartByMonth', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Statistik Pengajuan Judul PA Perbulan'
            },
            xAxis: {
                categories: {!! json_encode($categoriesByMonth) !!},
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
                data: {!! json_encode($dataByMonth) !!}

            }]
        });
    </script>
    <script>
        Highcharts.chart('chartByYear', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Statistik Pengajuan Judul PA pertahun'
            },
            xAxis: {
                categories: {!! json_encode($categoriesByYear) !!},
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
                data: {!! json_encode($dataByYear) !!}

            }]
        });
    </script>
@endsection
