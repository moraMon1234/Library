@extends('layout.master')
@section('pages')  

<div class="col-lg-12 grid-margin stretch-card m-5" style="left: 70%; top:15%;">
    <div class="card bg-dark text-center">
        <div class="card-header text-warning">
            <h2 class="mb-0">{{ $author->name }}</h2>
        </div>
        <div class="card-body">
            <h5 class="mb-3 text-primary">Author Details:</h5>
            <p class="text-light"><strong>Email:</strong> {{ $author->email }}</p>
            <p class="text-light"><strong>Bio:</strong> {{ $author->bio }}</p>
            <p class="text-light"><strong>Job Description:</strong> {{ $author->job_description }}</p>

            <div class="mt-3">
            <h5 class="text-primary">Book:</h5>
                @if($author->books_id)
                    <span class="badge bg-primary">{{ $author->book->name }}</span>
                @else
                    <span class="text-danger">No Book</span>
                @endif
            </div>
            <div class="mt-4">
                <h5 class="text-primary">Profile Image:</h5>
                @if($author->profile_image)
                    <img src="{{ asset('storage/images/' . $author->profile_image) }}" alt="Profile Image" class="img-fluid" style="max-width: 200px;">
                @else
                    <span class="text-danger">No Image</span>
                @endif
            </div>
        </div>
        <div class="card-footer text-center p-3">
            <a href="/author" class="btn btn-outline-light btn-lg">Back to Authors</a>
        </div>
    </div>
</div>

@endsection
