@extends('layouts.app')
@section('body')
<h1>update Book</b></h1>
<hr />

<form action="{{ route('book.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')
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
    <div class="row">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
@endsection