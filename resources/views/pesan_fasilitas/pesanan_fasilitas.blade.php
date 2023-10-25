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
        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h2 class="text-white">{{ $title }}</h2>
                </div>
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
                                <th><a href="/detail-pesanan/{{ $pesanan->id }}" class="btn btn-warning text-white">Detail pesanan</a></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th><a href="/checkout/{{ $pesanan->id }}" class="btn btn-primary text-white" onclick="return confirm('Apakah {{ auth()->user()->fullname }} yakin ingin checkout?')"><i class="bi bi-cart4"></i> Checkout</a></th>
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