@extends('layouts')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ ($type == "create") ? route('disease.store') : route('disease.update',$disease->id) }}" method="POST" class="row">
            @csrf
            @if ($type == "edit")
                @method("PUT")
            @endif
            <div class="col-12 form-group">
                <label for="" class="form-label">Kode Penyakit</label>
                <input type="text" readonly class="form-control @error('code') is-invalid @enderror" value="{{ $code }}" name="code" autofocus>
                @error('code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>                        
                @enderror
            </div>
            <div class="col-12 form-group">
                <label for="" class="form-label">Nama Penyakit</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $disease->name ?? '') }}" name="name">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>                        
                @enderror
            </div>
            <div class="col-12 form-group">
                <label for="" class="form-label">Solusi Penyakit</label>
                <textarea class="form-control @error('solution') is-invalid @enderror" name="solution">{{ old('solution', $disease->solution ?? '') }}</textarea>
                @error('solution')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>                        
                @enderror
            </div>
            <div class="col-12 d-flex justify-content-end">
                <a href="{{ route('disease.index') }}" class="btn btn-dark mr-2">Batal</a>
                <button class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection