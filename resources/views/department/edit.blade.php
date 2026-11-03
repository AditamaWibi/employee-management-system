@extends('layouts.app')

@section('title', 'Edit Department')

@section('content')

    <h2>Edit Department</h2>

    <form action="{{ route('department.update', $department) }}" method="POST">

        @csrf
        @method('PUT')

        <div>
            <label for="name">Department Name</label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $department->name) }}"
                required
            >

            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>

            <textarea
                id="description"
                name="description"
            >{{ old('description', $department->description) }}</textarea>

            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Update Department</button>

        <a href="{{ route('department.index') }}">Cancel</a>

    </form>

@endsection