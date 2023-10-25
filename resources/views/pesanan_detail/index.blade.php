@extends('layouts.main')

@section('content')

<div class="container">

    <div class="row py-3 text-center">
        <div class="col-lg-12">
            <h3>{{ $title }}</h3>
        </div>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-lg-8">
            <div class="table-resposive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Fasilitas</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Jumlah pesan</th>
                            <th>Total harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($pesananDetails->count() > 0)
                        @foreach($pesananDetails as $pesanan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pesanan->fasilitas->nama_fasilitas }}</td>
                            <td><a href="{{ asset('storage/' . $pesanan->fasilitas->image) }}" target="_blank"><img src="{{ asset('storage/' . $pesanan->fasilitas->image) }}" alt="" width="70"></a></td>
                            <td>Rp. {{ number_format($pesanan->fasilitas->harga) }}</td>
                            <td>{{ $pesanan->jumlah_pesan }}</td>
                            <td>Rp. {{ number_format($pesanan->total_harga) }}</td>
                            <td>
                                <a href="/hapus-pesanan/{{ $pesanan->id }}" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus pesanan?')">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                        @else 
                        <tr>
                            <td colspan="7" class="text-danger">{{ auth()->user()->fullname }}Belum memiliki pesanan detail</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection