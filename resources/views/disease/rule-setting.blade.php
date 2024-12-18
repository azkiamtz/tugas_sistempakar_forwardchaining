@extends('layouts')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('disease.rule-setting.update',$disease->id) }}" class="row" method="post">
                @csrf
                <div class="col-12 form-group">
                    <label class="form-label">Kode Penyakit</label>
                    <input type="text" readonly value="{{ $disease->code }}" class="form-control">
                </div>
                <div class="col-12 form-group">
                    <label class="form-label">Nama Penyakit</label>
                    <input type="text" readonly value="{{ $disease->name }}" class="form-control">
                </div>
                <div class="col-12 form-group">
                    <label class="form-label">Gejala</label>
                    <div class="row">
                        @foreach ($indications as $item)
                            <div class="col-12 col-md-4">
                                <label class="custom-switch mt-3 d-block">
                                    <input type="checkbox" name="indications[]" value="{{ $item->id }}" {{ (in_array($item->id,$rules)) ? "checked" : "" }} class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">{{ $item->name }} ({{ $item->code }})</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('indications')
                        <span class="text-danger mt-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('disease.index') }}" class="btn btn-dark mr-2">Back</a>
                    <button class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection