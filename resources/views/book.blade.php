@extends('layout.master')
@section('pages')  

    <div class="col-lg-12 grid-margin stretch-card m-5" style="left: 30% ;">
        <div class="card  bg-dark">
            <div class="card-body ">
                <h4 class="card-title text-primary">Books Table</h4>
                    <div class="table-responsive text-center">
                      <table class="table table-hover table-dark">
                        <thead>
                          <tr>
                            <th class="text-warning"> ID</th>
                            <th class="text-warning"> Name</th>
                            <th class="text-warning"> Description</th>
                            <th class="text-warning"> Price</th>
                            <th class="text-warning"> Author</th>
                            <th class="text-warning pl-5" > Image</th>
                            <th class="text-warning"> Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr class="fw-semibold">
                                <td>{{ $book->id }}</td>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->description }}</td>
                                <td>{{ $book->price }}</td>
                                <td>
                                    @if($book->author)
                                        {{ $book->author->name }}
                                    @else
                                        <span class="text-muted">No Author</span>
                                    @endif
                                 </td>

                                <td>
                                    <img src="{{ asset('images/' . $book->image) }}" alt="{{ $book->name }}" class="ms-5" style="width: 50px; height: 50px;">
                                </td>                                
                                <td class="text-center p-4">
                                    <a href="/update/{{ $book->id }}" class="btn btn-success d-inline m-3">
                                          Update
                                    </a>
                                    <form action="/delete/{{ $book->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete this book?')">
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
