@extends('layout.master')
@section('pages')  

<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-end mb-3">
            <a href="/create" class="btn btn-success">
                + Create a new book
            </a>
        </div>
    </div>
    <div class="card bg-dark">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title text-primary">Books Table</h4>
                <form action="/search" method="GET" class="d-flex">
                    <input type="text" name="query" id="searchInput" 
                        placeholder="Enter Book Name..." 
                        class="form-control border-0 shadow-lg"
                        style="border-bottom: 2px solid #007bff; color: black;">
                    <button type="submit" class="btn btn-primary ms-2">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>

            <div class="table-responsive text-center">
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th class="text-warning">ID</th>
                            <th class="text-warning">Name</th>
                            <th class="text-warning">Description</th>
                            <th class="text-warning">Price</th>
                            <th class="text-warning">Author</th>
                            <th class="text-warning">Student</th>
                            <th class="text-warning">Image</th>
                            <th class="text-warning">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                            <tr class="fw-semibold">
                                <td>{{ $book->id }}</td>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->description }}</td>
                                <td>${{ $book->price }}</td>
                                <td>
                                    @if($book->author)
                                        {{ $book->author->name }}
                                    @else
                                        <span class="text-muted">No Author</span>
                                    @endif
                                </td>
                                <td>
                                    @if($book->student)
                                        {{ $book->student->name }}
                                    @else
                                        <span class="text-muted">No Student</span>
                                    @endif
                                </td>
                                <td>
                                    <img src="{{ asset('images/' . $book->image) }}" 
                                         alt="{{ $book->name }}" 
                                         class="rounded" 
                                         style="width: 50px; height: 50px;">
                                </td>
                                <td class="text-center">
                                    <a href="/update/{{ $book->id }}" class="btn btn-success me-2">
                                        Update
                                    </a>
                                    <form action="/delete/{{ $book->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" 
                                            onclick="return confirm('Do you want to delete this book?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
