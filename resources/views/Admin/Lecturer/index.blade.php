@extends('layouts.basic')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('Admin.Lecturer.create') }}" class="btn btn-primary">(+) add</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>NIP</th>
                                <th>Prgram Study</th>
                                <th>Direct Supervisor</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->nip }}</td>
                                    <td>{{ $data->study_program->education_program }}-{{ $data->study_program->major }}</td>
                                    <td>{{ $data->direct_supervisor == null ? '-' : $data->direct_supervisor->name }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>
                                        <span class="badge text-bg-primary">
                                            <a class="text-decoration-none text-light" href="{{ route('Admin.Lecturer.show', ['data' => $data]) }}">
                                                Details
                                            </a>
                                        </span>
                                        <span class="badge text-bg-danger">
                                            <a class="text-decoration-none text-light" href="#" data-bs-toggle="modal" data-bs-target="#delete-{{ $data->id }}">
                                                Delete
                                            </a>
                                        </span>
                                        <span class="badge text-bg-warning">
                                            <a class="text-decoration-none text-light" href="{{ route('Admin.Lecturer.edit', ['data' => $data]) }}">
                                                Edit
                                            </a>
                                        </span>
                                    </td>
                                </tr>

                                <div class="modal fade" id="delete-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this data?</p>

                                                <form action="{{ route('Admin.Lecturer.delete', ['data' => $data]) }}" method="post">
                                                    @csrf
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input class="btn btn-danger" type="submit" value="delete">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
