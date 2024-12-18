@extends('layouts')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ ($type == "create") ? route('indication.store') : route('indication.update',$indication->id) }}" method="POST" class="row">
            @csrf
            @if ($type == "edit")
                @method("PUT")
            @endif
            <div class="col-12 form-group">
                <label for="" class="form-label">Kode Gejala</label>
                <input type="text" readonly class="form-control @error('code') is-invalid @enderror" value="{{ $code }}" name="code">
                @error('code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>                        
                @enderror
            </div>
            <div class="col-12 form-group">
                <label for="" class="form-label">Nama Gejala</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $indication->name ?? '') }}" autofocus name="name">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>                        
                @enderror
            </div>
            <div class="col-12 d-flex justify-content-end">
                <a href="{{ route('indication.index') }}" class="btn btn-dark mr-2">Batal</a>
                <button class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection