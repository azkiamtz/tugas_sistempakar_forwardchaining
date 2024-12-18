@extends('layouts')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ ($type == "create") ? route('patient.store') : route('patient.update',$user->id) }}" method="POST" class="row">
            @csrf
            @if ($type == "edit")
                @method("PUT")
            @endif
            <div class="col-12 form-group">
                <label for="" class="form-label">Nama Pasien</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name ?? '') }}" name="name">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>                        
                @enderror
            </div>
            <div class="col-12 form-group">
                <label for="" class="form-label">Email Pasien</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email ?? '') }}" name="email">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>                        
                @enderror
            </div>
            <div class="col-12 form-group">
                <label for="" class="form-label">Password Akun Pasien</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>                        
                @enderror
            </div>
            <div class="col-12 d-flex justify-content-end">
                <a href="{{ route('patient.index') }}" class="btn btn-dark mr-2">Batal</a>
                <button class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection