@extends('layouts.guest')

@section('content')
<section>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ url()->current() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
