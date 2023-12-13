@extends('layouts.app')
@section('body')

<form action="{{ route('mahasiswa.update', $mhs->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="py-5">
        <div class="row mb-3">
            <div class="col">
                <label for="">Nim : </label>
                <input type="text" name="nim" class="form-control" placeholder="your nim" value="{{ $mhs->nim }}">
            </div>
            <div class="col">
                <label for="">Nama : </label>

                <input type="text" name="nama" class="form-control" placeholder="your name" value="{{ $mhs->nama }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="">Jurusan : </label>

                <input type="text" name="jurusan" class="form-control" placeholder="your jurusan"
                    value="{{  $mhs->jurusan }}">
            </div>
            <div class="col">
                <label for="">Alamat : </label>

                <input type="text" name="alamat" class="form-control" placeholder="your alamat"
                    value=" {{ $mhs->alamat }} ">
            </div>
        </div>
        <div class=" row mb-3">
            <div class="col">
                <label for="">No Hp : </label>

                <input type="text" name="no_hp" class="form-control" placeholder="your no hp" value="{{ $mhs->no_hp }}">
            </div>
            <div class="col">
                <label for="">Email : </label>

                <input type="text" name="email" class="form-control" placeholder="Last email" value="{{ $mhs->email }}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</form>
@endsection