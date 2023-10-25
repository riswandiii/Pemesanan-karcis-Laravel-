@extends('layouts.main')

@section('content')

<div class="banner">
    <div class="owl-four owl-carousel" itemprop="image">
        <img src="images/page-banner.jpg" alt="Image of Bannner">
        <img src="images/page-banner2.jpg" alt="Image of Bannner">
        <img src="images/page-banner3.jpg" alt="Image of Bannner">
    </div>
    <div class="container" itemprop="description">
        <h1>welcome to parawisata salupajaan</h1>
        <h3>Sebuah website yang mempermudah pemesanan karcis Anda...</h3>
    </div>
     <div id="owl-four-nav" class="owl-nav"></div>
</div>

<!-- Banner Close -->
<div class="page-heading">
    <div class="container">
        <h2>Fasilitas All</h2>
    </div>
</div>

    <div class="container">

        <div class="row mb-3">
            <div class="col-lg-6 offset-lg-3">
                {{-- Form Seacrh --}}
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari fasilitas"  name="search" autofocus value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">Search</button>
                      </div>
                </form>
                {{-- End Form --}}
            </div>
        </div>

        @if(request('search'))
            <div class="row mb-3 text-center">
                <div class="col-lg-12">
                    @if($fasilitas->count() > 0)
                    <p class="text-success">Penacrian fasilitas <strong style="font-style: italic">"{{ request('search') }}"</strong> ditemukan!!</p>
                    @else
                    <p class="text-danger">Penacrian fasilitas <strong style="font-style: italic">"{{ request('search') }}"</strong> tidak ditemukan!</p>
                    @endif 
                </div>
            </div>
        @endif 

        <div class="row gx-1 mb-3">
                @foreach($fasilitas as $fas)
                <div class="col-lg-4 mb-1">
                    <div class="card">
                       <a href="{{ asset('storage/' . $fas->image) }}" target="_blank"> <img src="{{ asset('storage/' . $fas->image) }}" class="card-img-top" alt="..." class="img-fluid" id="fasilitas-image"  data-aos="flip-left" data-aos-duration="1000"></a>
                        <div class="card-body">
                          <h3 class="card-title">{{ $fas->nama_fasilitas }}</h3>
                          <h4 class="mb-1">Stock : {{ $fas->stock }}</h4>
                          @if($fas->harga == '0')
                          <h4 class="card-title">{{ $fas->keterangan }}</h4>
                          @else
                          <h4 class="card-title">Rp. {{ number_format($fas->harga) }}</h4>
                            @auth 
                            <?php
                                $userPesananKarcis = App\Models\PesananKarcis::where('user_id', auth()->user()->id)->first();
                                if(!empty($userPesananKarcis)){
                                    $pesanan = App\Models\PesananKarcis::where('user_id', auth()->user()->id)->count();
                                }
                            ?>
                            @endauth 
                            @if(empty($pesanan))
                            <h4 style="font-style: italic" class="text-danger">Pesan karcis terlebih dahulu</h4>
                            @else 
                            <a href="/pesan-fasilitas/{{ $fas->id }}" class="btn btn-primary text-white" class="text-white"><i class="bi bi-cart4"></i> Pesan Fasilitas</a>
                            @endif 
                          @endif 
                        </div>
                      </div>
                </div>
                @endforeach
        </div>
        
        <div class="row">
            <div class="col-lg-4">
                {{ $fasilitas->links() }}
            </div>
        </div>

    </div>

<section class="page-heading">
    <div class="container">
        <h2>Karcis all</h2>
    </div>
</section>
<section class="events-section" itemprop="event" itemscope itemtype=" http://schema.org/Event">
    <div class="container">
        {{-- Karcis --}}
        @foreach($karcis as $kar)
        <div class="event-wrap">
            <div class="img-wrap" itemprop="image">
                <img src="/images/background.jfif" class="img-thumbnail" alt="event images">
            </div>
            <div class="details" data-aos="flip-left" data-aos-duration="1000">
                <a href=""><h3 itemprop="name">Karcis parawisata salupajaan</h3></a>
                <p><strong>Stock karcis</strong>: {{ $kar->stock }}</p>
                <p><strong>Harga Karcis</strong>: Rp. {{ number_format($kar->harga) }}</p>
                <h5 itemprop="location"><i class="fas fa-map-marker-alt"></i> <strong>Alamat</strong>: Desa. Batetangnga, Kec. Binuang, Kab. Polewali Mandar, Sulawesi Barat</h5>
                <div class="py-3">
                    <a href="/pesan-karcis/{{ $kar->id }}" class="btn btn-primary btn-lg text-white"><i class="bi bi-cart4"></i> Pesan karcis</a>
                </div>
            </div>
        </div>
        @endforeach
        {{-- ENd Karcis --}}
    </div>
</section>
<!-- End of Events section -->

@endsection