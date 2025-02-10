
@extends('layout.master')

@section('pages')


<form action="{{ route('authors.update', $author->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- ✅ مهم جدا -->

    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ $author->name }}" required>

    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ $author->email }}" required>

    <label for="job_description">Job Description:</label>
    <input type="text" name="job_description" value="{{ $author->job_description }}" required>

    <label for="bio">Bio:</label>
    <textarea name="bio" required>{{ $author->bio }}</textarea>

    <label for="book_id">Select Book:</label>
    <select name="book_id">
        @foreach($books as $book)
            <option value="{{ $book->id }}" {{ $author->book_id == $book->id ? 'selected' : '' }}>
                {{ $book->title }}
            </option>
        @endforeach
    </select>

    <label for="image">Upload Image:</label>
    <input type="file" name="image">

    <button type="submit">Update</button>
</form>


@endsection

