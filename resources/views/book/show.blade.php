@extends('layout.master')
@section('pages')  

<div class="col-lg-12 grid-margin stretch-card m-5" style="left: 70%; top:15%;">
    <div class="card bg-dark text-center">
        <div class="card-header text-primary">
            <h2 class="mb-0">{{ $book->name }}</h2>
        </div>
        <div class="card-body">
            <h5 class="mb-3 text-warning">Book Details:</h5>
            <p class="text-light"><strong>Description:</strong> {{ $book->description }}</p>
            <p class="text-light"><strong>Price:</strong> ${{ number_format($book->price, 2) }}</p>

            <!-- عرض جميع الفئات -->
            <div class="mt-3">
                <h5 class="text-warning">Categories:</h5>
                @if($book->categories->isNotEmpty())
                    @foreach($book->categories as $category)
                        <span class="badge bg-primary">{{ $category->name }}</span>
                    @endforeach
                @else
                    <span class="text-danger">No Categories</span>
                @endif
            </div>

            <div class="mt-4">
                <h5 class="text-warning">All Available Categories:</h5>
                @foreach($categories as $category)
                    @if($book->categories->contains($category))
                        <span class="badge bg-success">{{ $category->name }}</span>
                    @else
                        <span class="badge bg-secondary">{{ $category->name }}</span>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="card-footer text-center p-3">
            <a href="/book" class="btn btn-outline-light btn-lg">Back to Books</a>
        </div>
    </div>
</div>

@endsection
