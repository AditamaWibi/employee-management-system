@extends('layouts.app')

@section('title', 'Departments')

@section('content')

    <h2>Departments</h2>

    <a href="{{ route('department.create') }}">
        Add Department
    </a>

    @if ($departments->isEmpty())
        <p>No departments found.</p>
    @else

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>{{ $department->id }}</td>

                        <td>{{ $department->name }}</td>

                        <td>{{ $department->description ?? '-' }}</td>

                        <td>
                            {{ $department->created_at->format('d M Y H:i') }}
                        </td>

                        <td>
                            <a href="{{ route('department.show', $department) }}">
                                View
                            </a>

                            <a href="{{ route('department.edit', $department) }}">
                                Edit
                            </a>

                            <form
                                action="{{ route('department.destroy', $department) }}"
                                method="POST"
                                style="display: inline;"
                                onsubmit="return confirm('Are you sure you want to delete this department?');"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $departments->links() }}

    @endif

@endsection