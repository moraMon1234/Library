@extends('layout.master')

@section('pages')

<div class="col-12 grid-margin stretch-card" style="left: 70%;">
    <div class="card shadow-lg border-0 rounded-3 bg-dark text-white m-5">
        <div class="card-body">
            <h4 class="card-title text-center text-primary">Update Student</h4>
            <p class="card-description text-center text-light">Edit student details</p>
            
            <form action="/studentedit" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $student->id }}">

                <div class="form-group">
                    <label for="name" class="text-light">Name</label>
                    <input type="text" class="form-control bg-dark text-white border-primary" id="name" name="name" value="{{ old('name', $student->name) }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="text-light">Email</label>
                    <input type="email" class="form-control bg-dark text-white border-primary" id="email" name="email" value="{{ old('email', $student->email) }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone" class="text-light">Phone</label>
                    <input type="number" class="form-control bg-dark text-white border-primary" id="phone" name="phone" value="{{ old('phone', $student->phone) }}">
                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary btn-lg w-45">Update Student</button>
                    <button type="reset" class="btn btn-outline-light btn-lg w-45">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
