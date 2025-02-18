@extends('layout.master')
@section('pages')  

<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-end mb-3">
            <a href="/add" class="btn btn-success">
                + Create a new author
            </a>
        </div>
    </div>

    <div class="card bg-dark">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title text-primary">Authors Table</h4>
                <form action="/authorsearch" method="GET" class="d-flex">
                    <input type="text" name="query" id="searchInput" 
                        placeholder="Enter Author Name..." 
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
                            <th class="text-warning">Email</th>
                            <th class="text-warning">Job Description</th>
                            <th class="text-warning">Bio</th>
                            <th class="text-warning">Book</th>
                            <th class="text-warning">Image</th>
                            <th class="text-warning">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($authors as $author)
                            <tr class="fw-semibold">
                                <td>{{ $author->id }}</td>
                                <td>{{ $author->name }}</td>
                                <td>{{ $author->email }}</td>
                                <td>{{ $author->job_description }}</td>
                                <td>{{ $author->bio }}</td>
                                <td>
                                    @if($author->book)
                                        {{ $author->book->name }}
                                    @else
                                        <span class="text-danger">No Book</span>
                                    @endif
                                </td>     
                                <td>
                                    <img src="{{ asset('images/' . $author->profile_image) }}" 
                                         alt="{{  $author->name}}"  
                                         class="rounded" 
                                         style="width: 50px; height: 50px;">
                                </td>                             
                                <td class="text-center">
                                    <a href="/edit/{{ $author->id }}" class="btn btn-success me-2">
                                        Update
                                    </a>
                                    <form action="/destroy/{{ $author->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete this author?')">
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
