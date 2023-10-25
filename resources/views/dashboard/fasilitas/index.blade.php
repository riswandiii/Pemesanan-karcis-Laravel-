@extends('dashboard.layouts.main')

@section('content')

<div class="row py-3">
    <div class="col-lg-12">
        <h3>{{ $title }}</h3>
    </div>
</div>

@if(session()->has('success'))
<div class="row mb-b">
    <div class="col-lg-6">
        <small>
            <div class="alert alert-primary" role="alert">
                {{ session('success') }}
            </div>
        </small>
    </div>
</div>
@endif

<div class="row mb-4">
   <div class="col-lg-4">
        <a href="/data-fasilitas/create" class="btn btn-primary btn-sm">Create fasilitas</a>
   </div>
</div>

<div class="row mb-4">
    <div class="col-lg-6">
        <form action="" method="get">
            {{-- Form Search --}}
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search fasilitas..." name="search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
              </div>
            {{-- End form --}}
        </form>
    </div>
</div>

{{-- Jika ada seacrh --}}
@if(request('search'))
<div class="row mb-4">
    <div class="col-lg-12">

        @if($fasilitas->count() > 0)
        <p class="text-success">Penacarian <strong style="font-style: italic">"{{ request('search') }}"</strong> ditemuakan!</p>
        @else 
        <p class="text-danger">Penacarian <strong style="font-style: italic">"{{ request('search') }}"</strong> tidak di temukan!</p>
        @endif 

    </div>
</div>
@endif 
{{-- End search --}}

<div class="row mb-3">
    <div class="col-lg-12">
        <div class="table-resposive">
            <table class="table table-sm table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Nama Fasilitas</th>
                        <th>Fasilitas</th>
                        <th>Harga</th>
                        <th>Stock</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($fasilitas->count() > 0)
                    
                    @foreach($fasilitas as $fas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset('storage/' . $fas->image) }}" alt="" width="60" class=""></td>
                        <td>{{ $fas->nama_fasilitas }}</td>
                        <td>{{ $fas->fasilitas }}</td>
                        <td>Rp. {{ number_format($fas->harga) }}</td>
                        <td>{{ $fas->stock }}</td>
                        <td>{{ $fas->keterangan }}</td>
                        <td>
                            <a href="/data-fasilitas/{{ $fas->id }}" class="badge bg-info"> <span data-feather="eye"></span></a>
                            <a href="/data-fasilitas/{{ $fas->id }}/edit" class="badge bg-warning"> <span data-feather="edit"></span></a>
                            {{-- Form Delete --}}
                            <form action="/data-fasilitas/{{ $fas->id }}" method="post" class="d-inline">
                                @csrf 
                                @method('delete')
                            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Yakin ingin hapus data?')"><span data-feather="x-circle"></span></button>
                            </form>
                            {{-- End Form --}}
                        </td>
                    </tr>
                    @endforeach

                    @else
                    <tr><td colspan="6" class="text-danger">Belum ada data fasilitas</td></tr> 
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection