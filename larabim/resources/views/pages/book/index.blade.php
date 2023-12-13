@extends('layouts.app')


@section('body')

<div class="d-flex align-items-center justify-content-between my-4">
    <h1> List Books</h1>
    <a href="{{ route('book.create') }}" class="btn btn-primary">Add Book</a>
</div>
<hr />

@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@elseif (Session::has('error'))
<div class="alert alert-success" role="alert">
    {{ Session::get('error') }}
</div>
@endif

<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th class="text-center border border-black">No</th>
            <th class="text-center border border-black">Name</th>
            <th class="text-center border border-black">Author</th>
            <th class="text-center border border-black">Year</th>
            <th class="text-center border border-black">Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($books->count() > 0 )
        @foreach ( $books as $book )
        <tr>
            <td class="align-middle border border-black  text-center">{{ $loop->iteration }}</td>
            <td class="align-middle border border-black ">{{ $book->name }}</td>
            <td class="align-middle border border-black text-center">{{ $book->author }}</td>
            <td class="align-middle border border-black text-center">{{ $book->year}}</td>
            <td class="align-middle border border-black text-center text-center">
                <div class="btn-group  border border-black">
                    <a class="btn btn-secondary" href="{{ route('book.show', $book->id) }}">detail</a>
                    <a class="btn btn-warning" href="{{ route('book.edit', $book->id ) }}">edit</a>
                    <form action="{{ route('book.destroy', $book->id) }}" method="POST" class=""
                        onsubmit="return confirm('apakah yakin delete data ? ')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger rounded rounded-0">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        @else
    </tbody>
    <tr>
        <td class=" text-center " colspan=" 5">Book Not Found
        </td>
    </tr>
    @endif
</table>
@endsection