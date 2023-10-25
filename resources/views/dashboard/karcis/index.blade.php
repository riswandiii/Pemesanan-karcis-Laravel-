@extends('dashboard.layouts.main')

@section('content')

<div class="row py-3">
    <div class="col-lg-12">
        <h3>{{ $title }}</h3>
    </div>
</div>

<div class="row mb-4">
    <div class="col-lg-12">
        <a href="/data-karcis/create" class="btn btn-primary btn-sm">Create karcis</a>
    </div>
</div>

@if(session()->has('success'))
<div class="row mb-4">
    <div class="col-lg-6">
        <small>
            <div class="alert alert-primary" role="alert">
                {{ session('success') }}
            </div>
        </small>
    </div>
</div>
@endif

<div class="row mb-3">
<div class="col-lg-6">
    <div class="table-responsive">
        <table class="table table-sm table-bordered">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No</th>
                    <th>Stock karcis</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($karcis->count() > 0)

                @foreach($karcis as $kar)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kar->stock }}</td>
                    <td>Rp. {{ number_format($kar->harga) }}</td>
                    <td>
                        <a href="/data-karcis/{{ $kar->id }}/edit" class="badge bg-warning"> <span data-feather="edit"></span></a>
                        {{-- Form Delete --}}
                        <form action="/data-karcis/{{ $kar->id }}" method="post" class="d-inline">
                            @csrf 
                            @method('delete')
                        <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Yakin ingin hapus data?')"><span data-feather="x-circle"></span></button>
                        </form>
                        {{-- End Form --}}
                    </td>
                </tr>
                @endforeach

                @else 
                <tr>
                    <td colspan="4" class="text-danger">Belum ada data karcis</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
</div>

@endsection