@extends('dashboard.layouts.main')

@section('content')

<div class="row py-3">
    <div class="col-lg-12">
        <h3>{{ $title }}</h3>
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-4">
        {{-- Form Search --}}
        <form action="" method="get">
             <div class="input-group mb-3">
                <input type="date" class="form-control" name="search">
                <button class="btn btn-outline-primary" type="submit" id="button-addon2">Tampilkan</button>
              </div>
        </form>
        {{-- End Form --}}
    </div>
</div>

@if(request('search'))
    <div class="row">
        <div class="col-lg-4">
            @if($buktiTransfer->count() > 0)
            <small><p class="text-success">Data pada tanggal <strong style="font-style: italic">"{{ request('search') }}"</strong> ditemukan</p></small>
            @else 
            <small><p class="text-danger">Data pada tanggal <strong style="font-style: italic">"{{ request('search') }}"</strong> tidak ditemukan</p></small>
            @endif
        </div>
    </div>
@endif

<div class="row mb-3">
<div class="col-lg-8">
    <div class="table-responsive">
        <table class="table table-sm table-bordered">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pemesan</th>
                    <th>Email</th>
                    <th>Total harga</th>
                    <th>Bukti pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @if($buktiTransfer->count() > 0)

                @foreach($buktiTransfer as $bukti)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date($bukti->created_at) }}</td>
                    <td>{{ $bukti->pesanan->user->fullname }}</td>
                    <td>{{ $bukti->pesanan->user->email }}</td>
                    <td>Rp. {{ number_format($bukti->pesanan->total) }}</td>
                    <td><a href="{{ asset('storage/' . $bukti->image) }}" target="_blank"><img src="{{ asset('storage/' . $bukti->image) }}" width="40" alt=""></a></td>
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