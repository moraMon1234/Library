@extends('layout.master')

@section('pages')
<div class="col-12 grid-margin stretch-card" style="left: 70%;">
    <div class="card shadow-lg border-0 rounded-3 bg-dark text-white m-5">
        <div class="card-body">
            <h4 class="card-title text-center text-primary">Update Book</h4>
            <p class="card-description text-center text-light">Enter your new book details</p>
            
            <form action="/update" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $book->id }}">

                <div class="form-group">
                    <label for="name" class="text-light">Title</label>
                    <input type="text" class="form-control bg-dark text-white border-primary" id="name" name="name" value="{{ $book->name }}" required>
                </div>

                <div class="form-group">
                    <label for="description" class="text-light">Description</label>
                    <textarea class="form-control bg-dark text-white border-primary" id="description" name="description" required>{{ $book->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="price" class="text-light">Price</label>
                    <input type="number" class="form-control bg-dark text-white border-primary" id="price" name="price" value="{{ $book->price }}" required>
                </div>

                <div class="form-group">
                    <label for="author_id" class="text-light">Author</label>
                    <select class="form-control bg-dark text-white border-primary" id="author_id" name="author_id" required>
                        <option value="">Select an Author</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="image" class="text-light">Book Image</label>
                    <input type="file" class="form-control bg-dark text-white border-primary" id="image" name="image" accept="image/*">
                </div>

                @if($book->image)
                    <div class="mb-3">
                        <label class="text-light d-block">Current Image:</label>
                        <img src="{{ asset('images/' . $book->image) }}" alt="{{ $book->name }}" width="100" class="border rounded">
                    </div>
                @endif

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary btn-lg w-45">Update Book</button>
                    <button type="reset" class="btn btn-outline-light btn-lg w-45">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
