@extends('layout.master')
@section('pages')  

<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-end mb-3">
            <a href="/{{ is_string($table) ? $table : 'item' }}create" class="btn btn-success">
                + Create a new {{ is_string($table) ? $table : 'item' }}
            </a>
        </div>
    </div>
    <div class="card bg-dark">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title text-primary">{{ is_string($table) ? ucfirst($table) : 'Items' }} Table</h4>
                <form action="/{{ is_string($table) ? $table : 'item' }}search" method="GET" class="d-flex">
                    <input type="text" name="query" id="searchInput" 
                        placeholder="Enter {{ is_string($table) ? ucfirst($table) : 'Item' }} Name..." 
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
                            @foreach($columns as $column)
                                <th class="text-warning">{{ $column['label'] ?? 'Column' }}</th>
                            @endforeach
                            <th class="text-warning">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($items as $item)
                            <tr>
                                @foreach($columns as $column)
                                    @php
                                        $field = $column['field'] ?? '';
                                        $value = data_get($item, $field, 'Not found');
                                    @endphp
                                <td>
                                    @if(in_array($field, ['image', 'profile_image']) && !empty($value))
                                        <img src="{{ asset('storage/images/' . $value) }}" 
                                            alt="image" 
                                            class="rounded" 
                                            style="width: 35px; height: 35px;">
                                    @else
                                        {{ $value }}
                                    @endif
                                </td>
                                @endforeach
                                <td>
                                    
                                    <a href="/{{ is_string($table) ? $table : 'item' }}show/{{ $item['id'] ?? '#' }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-eye"></i> Show
                                    </a>
                                    <a href="/{{ is_string($table) ? $table : 'item' }}update/{{ $item['id'] ?? '#' }}" class="btn btn-sm btn-success">
                                        <i class="fa fa-edit"></i> Update
                                    </a>
                                    <form action="/{{ is_string($table) ? $table : 'item' }}delete/{{ $item['id'] ?? '#' }}" method="POST" 
                                          style="display:inline-block;" 
                                          onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="text-center text-muted">
                                    No records found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
