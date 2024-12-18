<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISTEM PAKAR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<style>
    *{
        font-family: "Roboto", serif;
    }
</style>
    </head>
  <body class="py-5">
    <div class="container">
        @error('error')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h4 class="fw-bold mb-0 text-center text-uppercase">Diagnosa Penyakit Pada Anak metode forward chaining</h4>
            </div>
            <div class="card-body">
                <h5>Data Diri</h5>
                <hr>
                <form class="row" action="{{ route('consul.save') }}" method="POST">
                    @csrf
                    <div class="col-12 form-group">
                        <label for="" class="form-label">Kode Diagnosa</label>
                        <input type="text" readonly value="{{ $code }}" name="code" class="form-control">
                        @error('code')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="col-12 form-group mt-2">
                        <label for="" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control">
                        @error('email')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="col-12 form-group mt-2">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control">
                        @error('name')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    @foreach ($indications as $item)
                        <div class="col-12 mt-3">
                            <label for="" class="form-label">Apakah {{ $item->name }} ?</label>
                            <div class="d-flex gap-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" value="1" type="radio" name="{{ "gejala_".$item->id }}" role="switch" id="{{ $item->id }}-ya">
                                    <label class="form-check-label" for="{{ $item->id }}-ya">Ya</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" value="0" type="radio" name="{{ "gejala_".$item->id }}" role="switch" id="{{ $item->id }}-tidak">
                                    <label class="form-check-label" for="{{ $item->id }}-tidak">Tidak</label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12 mt-3 d-flex justify-content-end gap-2">
                        <button class="btn btn-secondary" type="reset">Reset</button>
                        <button class="btn btn-success" type="submit">Diagnosa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>