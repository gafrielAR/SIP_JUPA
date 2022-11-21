@extends('layouts.basic')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    <table class="table table-borderless">
                        <tr>
                            <td>NRP</td>
                            <td>:</td>
                            {{-- @foreach ($datas as $data) --}}
                            <td>{{ $data->student->nrp }}</td>
                            {{-- @endforeach --}}
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
