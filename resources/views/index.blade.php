@extends('layout.master')
@section('pages')  

<div class="container mt-5" id="index">
    <h2 class="text-center text-warning  mt-5 fw-bold text-uppercase">Books Collection</h2>
    <div class="table-responsive shadow-lg rounded-5 p-5">
        <table class="table table-active table-hover text-center align-middle border border-light rounded-5 pb-3  shadow-lg" 
        style="background-color: #0f1115;">
            <thead>
                <tr>
                    <th class="fs-4"> ID</th>
                    <th class="fs-4"> Name</th>
                    <th class="fs-4"> Description</th>
                    <th class="fs-4"> Price</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($books as $book)
                    <tr class="fw-semibold">
                        <td class="text-black">{{ $book->id }}</td>
                        <td class="text-black">{{ $book->name }}</td>
                        <td class="text-black">{{ $book->description }}</td>
                        <td class="text-danger fw-bold">{{ $book->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
