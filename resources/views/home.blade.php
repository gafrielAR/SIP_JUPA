@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th><code>NRP</code></th>
                                    <th>Name</th>
                                    <th>First Mentor</th>
                                    <th>Second Mentor</th>
                                    <th>Title</th>
                                    <th>Lab</th>
                                    <th>Proposal Date</th>
                                    <th>Proposal Revision Date</th>
                                    <th>Final Project Date</th>
                                    <th>Final Project Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($datas as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->student->nrp }}</td>
                                        <td>{{ $item->student->name }}</td>
                                        <td>{{ $item->stMentor->name }}</td>
                                        <td>{{ $item->ndMentor->name }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->lab->name }}</td>
                                        <td>{{ $item->proposal_date }}</td>
                                        <td>{{ $item->proposal_revision_date }}</td>
                                        <td>{{ $item->final_project_date }}</td>
                                        <td>{{ $item->final_project_status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
