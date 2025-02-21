@extends('layout.master')
@section('pages')

<div class="col-12 grid-margin stretch-card" style="left: 70%;">
    <div class="card shadow-lg border-0 rounded-3 bg-dark text-white m-5">
        <div class="card-body">
            <h4 class="card-title text-center text-primary">Create a New {{ ucfirst($table) }}</h4>
            <p class="card-description text-center text-light">Enter your {{ $table }} details</p>

            <form action="/{{ $table }}{{ $function }}" method="post" enctype="multipart/form-data">
                @csrf
                @foreach ($fields as $field)
                    <div class="form-group">
                        <label for="{{ $field['name'] }}" class="text-light">{{ $field['label'] }}</label>

                        @if (in_array($field['type'], ['text', 'number', 'email']))
                            <input type="{{ $field['type'] }}" 
                                   class="form-control bg-dark text-white border-primary @error($field['name']) is-invalid @enderror" 
                                   id="{{ $field['name'] }}" 
                                   name="{{ $field['name'] }}" 
                                   value="{{ old($field['name'], $field['value'] ?? '') }}">
                        
                        @elseif ($field['type'] === 'hidden')
                            <input type="hidden" 
                                id="{{ $field['name'] }}" 
                                name="{{ $field['name'] }}" 
                                value="{{ old($field['name'], $field['value'] ?? '') }}">

                        @elseif ($field['type'] === 'textarea')
                            <textarea class="form-control bg-dark text-white border-primary @error($field['name']) is-invalid @enderror" 
                                      id="{{ $field['name'] }}" 
                                      name="{{ $field['name'] }}">{{ old($field['name'], $field['value'] ?? '') }}</textarea>
                        
                        @elseif ($field['type'] === 'select' && isset($field['options']))
                            <select class="form-control bg-dark text-white border-primary @error($field['name']) is-invalid @enderror" 
                                    id="{{ $field['name'] }}" 
                                    name="{{ $field['name'] }}">
                                <option value="">Select {{ $field['label'] }}</option>
                                @foreach ($field['options'] as $option)
                                    <option value="{{ $option['value'] }}" 
                                            {{ old($field['name'], $field['value'] ?? '') == $option['value'] ? 'selected' : '' }}>
                                        {{ $option['label'] }}
                                    </option>
                                @endforeach
                            </select>
                        
                        @elseif ($field['type'] === 'multiselect' && isset($field['options']))
                            <select class="form-control bg-dark text-white border-primary" 
                                    id="{{ $field['name'] }}" 
                                    name="{{ $field['name'] }}[]" 
                                    multiple>
                                @foreach ($field['options'] as $option)
                                    <option value="{{ $option['value'] }}" 
                                            {{ in_array($option['value'], old($field['name'], $field['value'] ?? [])) ? 'selected' : '' }}>
                                        {{ $option['label'] }}
                                    </option>
                                @endforeach
                            </select>

                        @elseif ($field['type'] === 'file')
                            <input type="file" 
                                   class="form-control bg-dark text-white border-primary @error($field['name']) is-invalid @enderror" 
                                   id="{{ $field['name'] }}" 
                                   name="{{ $field['name'] }}" 
                                   />
                        @endif

                        @error($field['name'])
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                @endforeach

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary btn-lg w-45">{{ ucfirst($function) }}</button>
                    <button type="reset" class="btn btn-outline-light btn-lg w-45">Cancel</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
