@extends('layout.master')

@section('pages')  

<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-end mb-3">
            <a href="/createstudent" class="btn btn-success">
                + Create a new student
            </a>
        </div>
    </div>

    <div class="card bg-dark">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title text-primary">Student Table</h4>
                <!-- البحث -->
                <form action="/studentsearch" method="GET" class="d-flex">
                    <input type="text" name="query" id="searchInput" 
                        placeholder="Enter Student Name..." 
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
                            <th class="text-warning">Email</th>
                            <th class="text-warning">Phone</th>
                            <th class="text-warning">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr class="fw-semibold">
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->phone }}</td>
                                <td class="text-center">
                                    <a href="/studentshow/{{ $student->id }}" class="btn btn-primary ">Show</a>
                                    <a href="/studentedit/{{ $student->id }}" class="btn btn-success ms-3">Update</a>
                                    <form action="/studentdestroy/{{ $student->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ms-3" onclick="return confirm('Do you want to delete this student?')">
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
