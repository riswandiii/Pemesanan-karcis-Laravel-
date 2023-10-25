@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row py-5 justify-content-center">
            <div class="col-lg-8">
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h2 class="text-white">Detail {{ $title }}</h2>
                    </div>
                    <a href="{{ asset('storage/' . $fasilitas->image) }}" target="_blank"><img src="{{ asset('storage/' . $fasilitas->image) }}" class="card-img-top" alt="..." data-aos="flip-left" data-aos-duration="1000" style="height: 400px"></a>
                    <div class="card-body">
                      <div class="table-responsive mt-3">
                        <table class="table table-striped">
                            <tbody>
                                @if(session()->has('success'))
                                <th colspan="3">
                                      <div class="alert alert-primary" role="alert">
                                       <strong>{{ session('success') }}</strong>
                                      </div>
                                </th>
                                @endif 
                                <tr>
                                    <th>Nama fasilitas</th>
                                    <th>:</th>
                                    <th>{{ $fasilitas->nama_fasilitas }}</th>
                                </tr>
                                <tr>
                                    <th>Fasilitas</th>
                                    <th>:</th>
                                    <th>{{ $fasilitas->fasilitas }}</th>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <th>:</th>
                                    <th>RP. {{ number_format($fasilitas->harga) }}</th>
                                </tr>
                                <tr>
                                    <th>Stock Fasilitas</th>
                                    <th>:</th>
                                    <th>{{ $fasilitas->stock }}</th>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <th>:</th>
                                    <th>{{ $fasilitas->keterangan }}</th>
                                </tr>
                                <tr>
                                    
                                    <th>Jumlah pesanan</th>
                                    <th>:</th>
                                    <th>
                                        <form action="/pesan-fasilitas/{{ $fasilitas->id }}" method="post">
                                            @csrf 
                                            <input type="hidden" name="fasilitas_id" value="{{ $fasilitas->id }}">
                                            <input type="number" class="form control" required name="jumlah_pesan">
                                            <input type="hidden" name="harga" value="{{ $fasilitas->harga }}">
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                      </div>
                      <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-cart4"></i> Pesan sekarang</button>
                    </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>

@endsection