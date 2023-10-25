@extends('dashboard.layouts.main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome, {{ $title }} wisata saluu pajaan</h1>
</div>

<div class="row">
    <div class="col-lg-12">
        <img src="/images/bgdash.jfif" alt="" class="d-block img-fluid" height="400">
    </div>
</div>

{{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}

@endsection