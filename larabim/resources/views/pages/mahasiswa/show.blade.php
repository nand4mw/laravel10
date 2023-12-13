@extends('layouts.app')
@section('body')


<div class="py-5">
    <div class="row mb-3">
        <div class="col">
            <label for="">Nim : </label>
            <input type="text" name="nim" class="form-control" placeholder="your nim" value="{{ $mahasiswas->nim }}">
        </div>
        <div class="col">
            <label for="">Nama : </label>

            <input type="text" name="nama" class="form-control" placeholder="your name" value="{{ $mahasiswas->nama }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="">Jurusan : </label>

            <input type="text" name="jurusan" class="form-control" placeholder="your jurusan"
                value="{{  $mahasiswas->jurusan }}">
        </div>
        <div class="col">
            <label for="">Alamat : </label>

            <input type="text" name="alamat" class="form-control" placeholder="your alamat"
                value=" {{ $mahasiswas->alamat }} ">
        </div>
    </div>
    <div class=" row mb-3">
        <div class="col">
            <label for="">No Hp : </label>

            <input type="text" name="no_hp" class="form-control" placeholder="your no hp"
                value="{{ $mahasiswas->no_hp }}">
        </div>
        <div class="col">
            <label for="">Email : </label>

            <input type="text" name="email" class="form-control" placeholder="Last email"
                value="{{ $mahasiswas->email }}">
        </div>
    </div>

</div>
@endsection