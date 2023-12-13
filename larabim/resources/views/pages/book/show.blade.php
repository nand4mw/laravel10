@extends('layouts.app')
@section('body')
<h1>Detail Book</b></h1>
<hr />
@csrf
<div class="row mb-3">
    <div class="col">
        <label for="">Nama Buku : </label>
        <input type="text" name="name" value="{{ $book->name }}" class="form-control" placeholder="Book Name">
    </div>
    <div class="col">
        <label for="">Author :</label>
        <input type="text" name="author" value="{{ $book->author }}" class="form-control" placeholder="Author">
    </div>
</div>
<div class="row mb-3">
    <div class="col">
        <label for="">Year :</label>
        <input type="text" name="year" value="{{ $book->year }}" class="form-control" placeholder="Year">
    </div>
    <div class="col">
        <label for="">description :</label>
        <textarea class="form-control" name="description" readonly>{{ $book->description }}</textarea>
    </div>
</div>
<div class="row mb-3">
    <div class="col">
        <label for="">Created At :</label>
        <input type="text" name="created_at" value="{{ $book->created_at }}" class="form-control" placeholder="Year">
    </div>
    <div class="col">
        <label for="">Update At :</label>
        <input type="text" name="updated_at" value="{{ $book->created_at }}" class="form-control" placeholder="Year">
    </div>
</div>

@endsection