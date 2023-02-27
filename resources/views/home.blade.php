@push('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@endpush

@extends('layouts.app')
@section('content')

@php
    $res = Cache::get('restaurants');
@endphp

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

                </div>
            </div>
        </div>
    </div>
</div>

<div style="height: 50px;"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach ($res as $r)

                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $r->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $r->location }}</h6>
                        <p class="card-text">
                            <ul class="list-unstyled">
                                <li>เวลาเปิด :: {{ $r->opening }}</li>
                                <li>วันหยุด :: {{ $r->dayoff }}</li>
                                <li>เบอร์โทรศัพท์ :: {{ $r->tel }}</li>
                                <li>ที่จอดรถ :: {{ $r->parking }}</li>
                                <li>Website :: {{ $r->website }}</li>
                            </ul>
                        </p>
                    </div>
                </div>

            @endforeach

        </div><!-- /.col-md-8 -->
    </div><!-- /.row -->
</div><!-- /.container -->

@endsection
