@extends('dashboard.layouts.main')

@section('content')

<div class="row py-3">
    <div class="col-lg-12">
        <h3>{{ $title }}</h3>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <form action="/data-fasilitas" method="post" enctype="multipart/form-data">
            @csrf 

            {{-- <div class="mb-2">
                <label for="category_id" class="form-label">Category fasilitas</label>
                <select class="form-select" name="category_id">
                    <option selected>---Pilih---</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                  </select>
            </div> --}}

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <img class="img-preview col-lg-3 mb-2 img-fluid">
                <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="nama_fasilitas" class="form-label"> Nama Fasilitas</label>
                <input type="text" id="nama_fasilitas" name="nama_fasilitas" class="form-control @error('nama_fasilitas') is-invalid @enderror" value="{{ old('nama_fasilitas') }}">
                @error('nama_fasilitas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="fasilitas" class="form-label">Fasilitas</label>
                <input type="text" id="fasilitas" name="fasilitas" class="form-control @error('fasilitas') is-invalid @enderror" value="{{ old('fasilitas') }}">
                @error('fasilitas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" id="harga" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}">
                @error('harga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" id="stock" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}">
                @error('stock')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>


            <div class="mb-2">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" id="keterangan" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}">
                @error('keterangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-2">
                <button type="submit" class="btn btn-primary btn-sm w-50">Submit</button>
                <button class="btn btn-danger btn-sm" type="reset">Reset</button>
            </div>

        </form>
    </div>
</div>

@endsection

