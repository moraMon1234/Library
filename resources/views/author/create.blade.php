@extends('layout.master')

@section('pages')

<div class="col-12 grid-margin stretch-card" style="left: 70%;">
    <div class="card shadow-lg border-0 rounded-3 bg-dark text-white m-5">
        <div class="card-body">
            <h4 class="card-title text-center text-primary">Create a New Author</h4>
            <p class="card-description text-center text-light">Enter author details</p>
            
            <form action="/Authorstore" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="name" class="text-light">Name</label>
                    <input type="text" class="form-control bg-dark text-white border-primary" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email" class="text-light">Email</label>
                    <input type="email" class="form-control bg-dark text-white border-primary" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="job_description" class="text-light">Job Description</label>
                    <input type="text" class="form-control bg-dark text-white border-primary" id="job_description" name="job_description" required>
                </div>

                <div class="form-group">
                    <label for="bio" class="text-light">Bio</label>
                    <textarea class="form-control bg-dark text-white border-primary" id="bio" name="bio" required></textarea>
                </div>

                <div class="form-group">
                    <label for="books_id" class="text-light">Select Book</label>
                    <select class="form-control bg-dark text-white border-primary" id="books_id" name="books_id" required>
                        <option value="">Select a Book</option>
                        @foreach($books as $book)
                            <option value="{{ $book->id }}">{{ $book->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="image" class="text-light">Profile Image</label>
                    <input type="file" class="form-control bg-dark text-white border-primary" id="image" name="image" accept="image/*">
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary btn-lg w-45">Add an Author</button>
                    <button type="reset" class="btn btn-outline-light btn-lg w-45">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
