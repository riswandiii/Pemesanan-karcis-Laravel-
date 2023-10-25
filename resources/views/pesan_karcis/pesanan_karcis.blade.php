@extends('layouts.main')

@section('content')

<div class="container">

    {{-- Alert --}}
    @if(session()->has('success'))
    <div class="row mt-5 justify-content-center">
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
                            @if($pesananKarcis->count() > 0)
                            @foreach($pesananKarcis as $karcis)
                            <tr>
                                <th>Jumlah pesanan karcis</th>
                                <th>:</th>
                                <th>{{ $karcis->jumlah_pesan }}</th>
                            </tr>
                            <tr>
                                <th>Total harga karcis</th>
                                <th>:</th>
                                <th>Rp. {{ number_format($karcis->total) }}</th>
                            </tr>
                            @endforeach
                            @else 
                            <tr>
                                <th class="text-danger" colspan="2">{{ auth()->user()->fullname }}, Anda belum memiliki karcis!</th>
                            </tr>
                            @endif 
                        </tbody>
                    </table>
                  </div>
                </div>
            </form>
              </div>
            {{-- End Card --}}
        </div>
    </div>
</div>

@endsection