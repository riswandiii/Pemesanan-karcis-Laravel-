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
            @if($pesanans->count() > 0)
            <small><p class="text-success">Data pada tanggal <strong style="font-style: italic">"{{ request('search') }}"</strong> ditemukan</p></small>
            @else 
            <small><p class="text-danger">Data pada tanggal <strong style="font-style: italic">"{{ request('search') }}"</strong> tidak ditemukan</p></small>
            @endif
        </div>
    </div>
@endif

<div class="row mb-3">
<div class="col-lg-10">
    <div class="table-responsive">
        <table class="table table-sm table-bordered">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No</th>
                    <th>Tanggal pesanan</th>
                    <th>Nama pemesan</th>
                    <th>Total karcis</th>
                    <th>Nama fasilitas</th>
                    <th>Total harga</th>
                    <th>Keterangan</th>
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @if($pesanans->count() > 0)

                @foreach($pesanans as $pesanan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pesanan->tanggal }}</td>
                    <td>{{ $pesanan->pesanan->user->fullname }}</td>
                    <td>{{ $pesanan->jumlah_karcis }}</td>
                    <td>{{ $pesanan->fasilitas->nama_fasilitas }}</td>
                    <td>Rp. {{ number_format($pesanan->total_harga) }}</td>
                    @if($pesanan->status == 1)
                    <td class="text-success">Sudah di checkout</td>
                    @elseif($pesanan->status == 2)
                    <td class="text-success">Sudah di checkout</td>
                    @else 
                    <td class="text-danger">Belum di checkout</td>
                    @endif
                    {{-- <td>
                        <a href="/detail-pesanan-user/{{ $pesanan->id }}" class="badge bg-warning"> <span data-feather="eye"></span></a>
                    </td> --}}
                </tr>
                @endforeach

                @else 
                <tr>
                    <td colspan="7" class="text-danger">Belum ada data pesanan</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
</div>

@endsection