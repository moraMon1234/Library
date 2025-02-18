@extends('layout.master')
@section('pages')  

<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-end mb-3">
            <a href="/createcategory" class="btn btn-success">
                + Create a new category
            </a>
        </div>
    </div>
    <div class="card bg-dark">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title text-primary">Category Table</h4>
                <form action="/categorysearch" method="GET" class="d-flex">
                    <input type="text" name="query" id="searchInput" 
                        placeholder="Enter Ctegory Name..." 
                        class="form-control border-0 shadow-lg"
                        style="border-bottom: 2px solid #007bff; color: black;">
                    <button type="submit" class="btn btn-primary ms-2">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="table-responsive text-center">
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th class="text-warning">ID</th>
                            <th class="text-warning">Name</th>
                            <th class="text-warning">Description</th>
                            <th class="text-warning">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr class="fw-semibold">
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td class="text-center">
                                    <a href="/categoryshow/{{ $category->id }}" class="btn btn-primary ">Show</a>
                                    <a href="/categoryedit/{{ $category->id }}" class="btn btn-success ms-3">Update</a>
                                    <form action="/categorydestroy/{{ $category->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ms-3" onclick="return confirm('Do you want to delete this category?')">
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
