@extends('layout.master')

@section('pages')

<div class="col-12 grid-margin stretch-card" style="left: 70%;">
    <div class="card shadow-lg border-0 rounded-3 bg-dark text-white m-5">
        <div class="card-body">
            <h4 class="card-title text-center text-primary">Create a New Book</h4>
            <p class="card-description text-center text-light">Enter your book details</p>

            <form action="/store" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name" class="text-light">Title</label>
                    <input type="text" class="form-control bg-dark text-white border-primary @error('name') is-invalid @enderror"
                           id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="text-light">Description</label>
                    <textarea class="form-control bg-dark text-white border-primary @error('description') is-invalid @enderror"
                              id="description" name="description">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price" class="text-light">Price</label>
                    <input type="number" class="form-control bg-dark text-white border-primary @error('price') is-invalid @enderror"
                           id="price" name="price" value="{{ old('price') }}">
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="author_id" class="text-light">Author</label>
                    <select class="form-control bg-dark text-white border-primary @error('author_id') is-invalid @enderror"
                            id="author_id" name="author_id">
                        <option value="">Select an Author</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="student_id" class="text-light">Student</label>
                    <select class="form-control bg-dark text-white border-primary @error('student_id') is-invalid @enderror"
                            id="student_id" name="student_id">
                        <option value="">Select a Student</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                        @endforeach
                    </select>
                    @error('student_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image" class="text-light">Book Image</label>
                    <input type="file" class="form-control bg-dark text-white border-primary @error('image') is-invalid @enderror"
                           id="image" name="image" accept="image/*">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary btn-lg w-45">Create a Book</button>
                    <button type="reset" class="btn btn-outline-light btn-lg w-45">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
