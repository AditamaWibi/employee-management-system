@extends('layouts.main')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Departments</h1>
    <a href="{{ route('departments.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded">Add Department</a>
</div>

<div class="bg-white shadow rounded overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="p-3">Name</th>
                <th class="p-3">Employees</th>
                <th class="p-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($departments as $department)
                <tr class="border-b">
                    <td class="p-3">{{ $department->name }}</td>
                    <td class="p-3">{{ $department->employees_count }}</td>
                    <td class="p-3 text-right">
                        <a href="{{ route('departments.edit', $department) }}"
                           class="text-blue-600 mr-3">Edit</a>
                        <form action="{{ route('departments.destroy', $department) }}" method="POST"
                              class="inline" onsubmit="return confirm('Delete this department?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="p-3 text-center text-gray-500">No departments yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $departments->links() }}</div>
@endsection