@extends('layout.master')
@section('pages')  

<div class="col-lg-12 grid-margin stretch-card m-5 " style="left: 70%; top:15%;">
    <div class="card bg-dark text-center">
        <div class="card-header text-primary">
            <h2 class="mb-0">{{ $category->name }}</h2>
        </div>
        <div class="card-body">
            <p class="text-light"><strong class="text-warning">Description:</strong> {{ $category->description }}</p>            
            <div class="category-books">
                <h5 class="mb-3 text-warning">Books in this Category ({{ $category->books->count() }}):</h5>
                
                @if($category->books->isEmpty())
                    <p class="text-light">No books available in this category.</p>
                @else
                    <ul class="list-group">
                        @foreach($category->books as $book)
                            <li class="list-group-item d-flex flex-column align-items-start bg-dark text-light">
                                <div class="d-flex justify-content-between w-100">
                                    <span class="fw-bold">{{ $book->name }}</span>
                                    <span class="badge bg-success">${{ number_format($book->price, 2) }}</span>
                                </div>

                                <div class="mt-2">
                                    <strong class="text-warning">Categories:</strong>
                                    @if($book->categories->isNotEmpty())
                                        @foreach($book->categories as $cat)
                                            <span class="badge bg-primary">{{ $cat->name }}</span>
                                        @endforeach
                                    @else
                                        <span class="text-muted">No Categories</span>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <div class="card-footer text-center p-3">
            <a href="/category" class="btn btn-outline-light btn-lg w-45">Back to categories</a>
        </div>
    </div>
</div>

@endsection
