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
                    <th>Fasilitas</th>
                    <th>Image</th>
                    <th>Harga</th>
                    <th>Jumlah pesan</th>
                    <th>Keterangan</th>
                    <th>Total harga</th>
                </tr>
            </thead>
            <tbody>
                @if($pesananDetails->count() > 0)

                @foreach($pesananDetails as $detail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $detail->fasilitas->nama_fasilitas }}</td>
                    <td><img src="{{ asset('storage/' . $detail->fasilitas->image) }}" alt="" width="40"></td>
                    <td>Rp. {{ number_format($detail->fasilitas->harga) }}</td>
                    <td>{{ $detail->jumlah_pesan }}</td>
                    @if($detail->status == '1')
                    <td class="text-success">Sudah di checkout</td>
                    @else 
                    <td class="text-danger">Belum di checkout</td>
                    @endif
                    <td>Rp. {{ number_format($detail->total_harga) }}</td>
                </tr>
                @endforeach

                @else 
                <tr>
                    <td colspan="7" class="text-danger">Belum ada data detail pesanan</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
</div>

@endsection