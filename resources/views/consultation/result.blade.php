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
        @session('success')
            <div class="alert alert-success">{{ session('success') }}</div>
        @endsession
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h4 class="fw-bold mb-0 text-center text-uppercase">Hasil Diagnosa #{{ $diagnosa->code }}</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3 d-print-none gap-2">
                    <a href="javascript:void[0]" onclick="print()" class="btn btn-outline-success">Cetak Hasil</a>
                    <a href="{{ route('consul') }}" class="btn btn-outline-dark">Home</a>
                </div>
                <table class="table">
                    <tr>
                        <th class="align-middle">Waktu Diagnosa</th>
                        <td class="align-middle">:</td>
                        <td class="align-middle">{{ date('d-m-Y H:i:s',strtotime($diagnosa->created_at)) }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Email</th>
                        <td class="align-middle">:</td>
                        <td class="align-middle">{{ $diagnosa->email }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Nama Pasien</th>
                        <td class="align-middle">:</td>
                        <td class="align-middle">{{ $diagnosa->name }}</td>
                    </tr>
                </table>
                <div class="table-responsive">
                    <table class="table text-center table-striped w-100">
                        <thead>
                            <tr>
                                <th colspan="3" class="align-middle bg-dark text-uppercase text-white">Kemungkinan Penyakit yang Dialami</th>
                            </tr>
                            <tr>
                                <th class="align-middle">No</th>
                                <th class="align-middle">Nama Penyakit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($possible as $item)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $item }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="align-middle" colspan="2">Tidak ada penyakit yang sesuai.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h4 class="fw-bold mb-0 text-center text-uppercase">Gejala yang Dialami</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center table-striped w-100">
                        <thead>
                            <tr>
                                <th class="align-middle">No</th>
                                <th class="align-middle">Kode Gejala</th>
                                <th class="align-middle">Nama Gejala</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($diagnosa->detail as $item)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $item->indication->code }}</td>
                                    <td class="align-middle">{{ $item->indication->name }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="align-middle" colspan="2">Tidak ada penyakit yang sesuai.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>