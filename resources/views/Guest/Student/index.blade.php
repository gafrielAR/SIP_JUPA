@extends('layouts.guest')

@section('content')
<section>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ url()->current() }}

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
                            @foreach ($datas as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->nrp }}</td>
                                    <td>{{ $row->study_program->education_programs }} {{ $row->study_program->department->name }}</td>
                                    {{-- <td>{{ $row->title }}</td>
                                    <td>{{ $row->final_project_status }}</td> --}}
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
