@extends('layout.master')
@section('pages')  

<div class="col-lg-12 grid-margin stretch-card m-5 " style="left: 70%; top:15%;">
    <div class="card bg-dark  text-center">
        <div class="card-header text-primary">
                    <h2 class="mb-0">{{ $student->name }}</h2>
                </div>
                <div class="card-body">
                <p class="text-light "><strong class="text-warning">Email:</strong> {{ $student->email }}</p>
                <p class="text-light "><strong class="text-warning">Phone</strong>:</strong> {{ $student->phone }}</p>
                    <div class="student-books ">
                        <h5 class="mb-3 text-warning ">Books Selected ({{ $student->books->count() }}):</h5>
                        @if($student->books->isEmpty())
                            <p class="text-light">No books selected by this student.</p>
                        @else
                            <ul class="list-group">
                                @foreach($student->books as $book)
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-light">
                                        <span class="fw-bold">{{ $book->name }}</span>
                                        <span class="badge bg-success">${{ number_format($book->price, 2) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="card-footer text-center p-3 ">
                    <a href="/studentedit/{{ $student->id }}"  class="btn btn-primary me-2">Edit</a> 
                    <a href="/student"  class="btn btn-outline-light btn-lg w-45">Back</a>
                </div>
            </div>
        </div>

@endsection
