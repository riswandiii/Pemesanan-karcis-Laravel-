@extends('dashboard.layouts.main')

@section('content')

    <div class="container">

        <div class="row py-3">
            <div class="col-lg-12">
                <h3>{{ $title }}</h3>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-8">
                <div class="card mb-3">
                    <a href="{{ asset('storage/' . $fasilitas->image) }}" target="_blank"><img src="{{ asset('storage/' . $fasilitas->image) }}" class="card-img-top" alt="..." data-aos="flip-left" data-aos-duration="1000" style="height: 300px"></a>
                    <div class="card-body">
                      <div class="table-responsive mt-3">
                        <table class="table table-striped">
                            <tbody>
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
                                    <th>Keterangan</th>
                                    <th>:</th>
                                    <th>{{ $fasilitas->keterangan }}</th>
                                </tr>
                            </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>

@endsection