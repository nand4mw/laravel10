<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    @extends('layouts.app')
    @section('body')

    @if (Session::has('success') )
    <div class="alert alert-success" role="alert">
        {{ (Session::get('success') ) }}

    </div>
    @endif

    <div class="d-flex align-items-center justify-content-between mt-4">
        <h1>List Mahasiswa</h1>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Add Mahasiswa</a>
    </div>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center" scope="col">No</th>
                <th class="text-center" scope="col">Nim</th>
                <th class="text-center" scope="col">Nama</th>
                <th class="text-center" scope="col">Jurusan</th>
                <th class="text-center" scope="col">Alamat</th>
                <th class="text-center" scope="col">No Telepon</th>
                <th class="text-center" scope="col">Email</th>
                <th class="text-center" scope="col">Action</th>
            </tr>
        </thead>


        <tbody class="table-group-divider">
            @if ($mahasiswas->count() > 0)
            @foreach ($mahasiswas as $mhs )
            <tr>
                <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                <td class="text-center">{{ $mhs->nim }}</td>
                <td class="text-center">{{ $mhs->nama }}</td>
                <td class="text-center">{{ $mhs->jurusan }}</td>
                <td class="text-center">{{ $mhs->alamat }}</td>
                <td class="text-center">{{ $mhs->no_hp }}</td>
                <td class="text-center">{{ $mhs->email }}</td>
                <td class="text-center">
                    <div class="btn-group">
                        <a href="{{ route('mahasiswa.show', $mhs->id) }}" class="btn btn-secondary">Detail</a>
                        <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST"
                            onsubmit="return confirm('apakah yakin data akan di hapus ? ')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded rounded-0 ">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="text-center" colspan="8"> tidak ada data</td>
            </tr>
        </tbody>

        @endif
    </table>
    @endsection

</body>

</html>