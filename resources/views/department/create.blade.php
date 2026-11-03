@extends('layouts.app')

@section('title','Departments')

@section('content')
    <h2>Create Department</h2>

    <form action="{{ route('department.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Department Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Descriptions</label>
            <textarea name="description" id="description" cols="30" rows="3">{{ old('description') }}</textarea>
            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Save Department</button>

        <a href="{{ route('department.index') }}">Cancel</a>
    </form>
@endsection