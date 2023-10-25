@extends('layouts.main')

@section('content')

<div class="container">


    {{-- Alert --}}
    @if(session()->has('success'))
    <div class="row mt-5 mt-5 justify-content-center">
        <div class="col-lg-6">
            <small>
                <div class="alert alert-primary" role="alert">
                    {{ session('success') }}
                </div>
            </small>
        </div>
    </div>
    @endif
    {{-- End Alert --}}

    <div class="row py-5 justify-content-center mb-5">
        <div class="col-lg-10">
            <div class="card mb-3">
                <div class="card-header bg-primary p-3">
                    {{-- <h2 class="text-white">{{ $title }}</h2> --}}
                    @if(!empty($pesanan))
                    <h3 class="text-white"><strong>{{ auth()->user()->fullname }}</strong>, berhasil melakukan checkout, silahkan melakukakan metode pembayaran di <strong>Bank BNI No. Rek 9876878599 atas nama : Admin</strong>, sebesar <strong> Rp. {{ number_format($pesanan->total) }}</strong></h3>
                    @else 
                    <h3 class="text-white">{{ auth()->user()->fullname }}, belum memiliki history pemesanan</h3>
                    @endif 
                </div>
                {{-- <img src="/images/background.jfif" class="card-img-top" alt="..." data-aos="flip-left" data-aos-duration="1000" style="height: 200px"> --}}
                <div class="card-body">
                  <div class="table-responsive mt-3">
                    <table class="table table-striped table-lg">
                        <tbody>
                            @if(!empty($pesanan))
                            <tr>
                                <th>Pemesan</th>
                                <th>:</th>
                                <th>{{ $pesanan->user->fullname }}</th>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th>:</th>
                                <th>{{ $pesanan->user->email }}</th>
                            </tr>
                            <tr>
                                <th>Tanggal pemesanan</th>
                                <th>:</th>
                                <th>{{ $pesanan->tanggal_pesanan }}</th>
                            </tr>
                            <tr>
                                <th>Total harga</th>
                                <th>:</th>
                                <th>Rp. {{ number_format($pesanan->total) }}</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th><a href="/detail-history-pesanan/{{ $pesanan->id }}" class="btn btn-warning text-white">Detail pesanan</a></th>
                            </tr>
                            <tr>
                                <th colspan="2">Upload bukti pembayaran</th>
                                <th>
                                    <form action="/upload-bukti-tf" method="post" enctype="multipart/form-data">
                                    @csrf 
                                    <img class="img-preview col-lg-2 mb-2 img-fluid">
                                    <input type="hidden" name="pesanan_id" value="{{ $pesanan->id }}">
                                    <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" onchange="previewImage()">
                                    <button class="btn btn-primary mt-1" type="submti">Ok</button>
                                    @if(!empty($bukti_tf))
                                    <a href="/cetak-pemesanan/{{ $pesanan->id }}" class="btn btn-success btn-sm mt-1 text-white">Cetak pemesanan</a>
                                    @endif
                                    </form>
                                </th>
                            </tr>
                            @else 
                            <tr>
                                <th class="text-danger" colspan="4">{{ auth()->user()->fullname }}, Anda belum memiliki pesanan fasilitas!</th>
                            </tr>
                            @endif 
                        </tbody>
                    </table>
                  </div>
                </div>
            </form>
              </div>
        </div>
    </div>

</div>

@endsection