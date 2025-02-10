@extends('layout.master')

@section('pages')  

<div class="col-lg-12 grid-margin stretch-card m-5" style="left: 30%;">
    <div class="card bg-dark">
        <div class="card-body">
            <h4 class="card-title text-primary">Authors Table</h4>
            <div class="table-responsive text-center">
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th class="text-warning">ID</th>
                            <th class="text-warning">Name</th>
                            <th class="text-warning">Email</th>
                            <th class="text-warning">Job Description</th>
                            <th class="text-warning">Bio</th>
                            <th class="text-warning">Image</th>
                            <th class="text-warning">Book</th>
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
                                <img src="{{ asset('images/' . $author->image) }}" alt="{{  $author->name}}" class="ms-5" style="width: 50px; height: 50px;">
                            </td>  
                            <td>
                                @if($author->book)
                                    {{ $author->book->name }}
                                @else
                                    <span class="text-muted">No Book</span>
                                @endif
                            </td>                                
                            <td class="text-center p-4">
                                <a href="/edit/{{ $author->id }}" class="btn btn-success d-inline m-3">
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
