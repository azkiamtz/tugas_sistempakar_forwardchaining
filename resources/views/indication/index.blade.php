@extends('layouts')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end mb-4">
                <a href="{{ route('indication.create') }}" class="btn btn-outline-success">Tambah Data</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped w-100 text-center" id="table">
                    <thead>
                        <tr>
                            <th class="align-middle">No</th>
                            <th class="align-middle">Kode Gejala</th>
                            <th class="align-middle">Nama Gejala</th>
                            <th class="align-middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $item->code }}</td>
                                <td class="align-middle">{{ $item->name }}</td>
                                <td class="align-middle">
                                    <div class="d-flex justify-content-center">
                                        <form class="mr-1" action="{{ route('indication.destroy',$item->id) }}" method="POST">
                                            @method("DELETE")
                                            @csrf
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapusnya?')">Delete</button>
                                        </form>
                                        <a href="{{ route('indication.edit',$item->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function(){
            datatable()
        })
    </script>
@endpush