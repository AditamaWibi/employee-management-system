@extends('layouts.app')

@section('title', 'Department Details')

@section('content')

    <h2>Department Details</h2>

    <div>
        <p><strong>ID:</strong> {{ $department->id }}</p>

        <p><strong>Name:</strong> {{ $department->name }}</p>

        <p>
            <strong>Description:</strong>
            {{ $department->description ?? 'No description provided.' }}
        </p>

        <p>
            <strong>Created At:</strong>
            {{ $department->created_at->format('d M Y H:i') }}
        </p>

        <p>
            <strong>Last Updated:</strong>
            {{ $department->updated_at->format('d M Y H:i') }}
        </p>
    </div>

    <a href="{{ route('department.edit', $department) }}">
        Edit Department
    </a>

    <a href="{{ route('department.index') }}">
        Back
    </a>

@endsection