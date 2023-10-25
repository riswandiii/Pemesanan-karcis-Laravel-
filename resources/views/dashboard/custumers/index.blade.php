@extends('dashboard.layouts.main')

@section('content')

<div class="row py-3">
    <div class="col-lg-12">
        <h3>{{ $title }}</h3>
    </div>
</div>

<div class="row mb-3">
<div class="col-lg-8">
    <div class="table-responsive">
        <table class="table table-sm table-bordered">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No</th>
                    <th>Nama panggilan</th>
                    <th>Nama lengkap</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @if($users->count() > 0)

                @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->nickname }}</td>
                    <td>{{ $user->fullname }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                @endforeach

                @else 
                <tr>
                    <td colspan="5" class="text-danger">Belum ada data user</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
</div>

@endsection