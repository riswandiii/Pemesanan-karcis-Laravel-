@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row py-5 justify-content-center">
        <div class="col-lg-6">
            {{-- Card --}}
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h2 class="text-white">{{ $title }}</h2>
                </div>
                <img src="/images/background.jfif" class="card-img-top" alt="..." data-aos="flip-left" data-aos-duration="1000" style="height: 200px">
                <div class="card-body">
                  <div class="table-responsive mt-3">
                    <table class="table table-striped table-lg">
                        <tbody>
                            <tr>
                                <th>Stock karcis</th>
                                <th>:</th>
                                <th>{{ $karcis->stock }}</th>
                            </tr>
                            <tr>
                                <th>Harga karcis</th>
                                <th>:</th>
                                <th>Rp. {{ number_format($karcis->harga) }}</th>
                            </tr>
                            <tr>
                                <th>Jumlah pesan</th>
                                <th>:</th>
                                <th>
                                    <form action="/pesan-karcis" method="post">
                                        @csrf 
                                        <input type="number" name="jumlah_pesan" autofocus required class="form-control">
                                        <input type="hidden" name="harga" value="{{ $karcis->harga }}">
                                        <input type="hidden" name="id" value="{{ $karcis->id }}">
                                </th>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                    <button type="submit" class="btn btn-primary btn-lg" onclick="return confirm('Yakin ingin pesan karcis?')"><i class="bi bi-cart4"></i> Pesan sekarang</button>
                </div>
            </form>
              </div>
            {{-- End Card --}}
        </div>
    </div>
</div>

@endsection