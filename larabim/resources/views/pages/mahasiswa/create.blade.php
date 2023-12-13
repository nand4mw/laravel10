@extends('layouts.app')
@section('body')

<form action="{{ route('mahasiswa.store') }}" method="POST">
    @csrf
    <div class="py-5">
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="nim" class="form-control" placeholder="your nim">
            </div>
            <div class="col">
                <input type="text" name="nama" class="form-control" placeholder="your name">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="jurusan" class="form-control" placeholder="your jurusan">
            </div>
            <div class="col">
                <input type="text" name="alamat" class="form-control" placeholder="your alamat">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="no_hp" class="form-control" placeholder="your no hp">
            </div>
            <div class="col">
                <input type="text" name="email" class="form-control" placeholder="Last email">
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="submit" id="submit">submit</button>
    </div>
</form>
@endsection