@extends('dashboard.layouts.main')

@section('content')

<div class="row py-3">
    <div class="col-lg-12">
        <h3>{{ $title }}</h3>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <form action="/data-karcis" method="post">
        @csrf 
        <div class="mb-2">
            <label for="stock" class="form-label">Stock karcis</label>
            <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}">
            @error('stock')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-2">
            <label for="harga" class="form-label">Harga karcis</label>
            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}">
            @error('harga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary btn-sm w-50">Submit</button>
            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
        </div>
        </form>
    </div>
</div>

@endsection