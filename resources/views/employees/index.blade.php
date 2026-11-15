@extends('layouts.main')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Employees</h1>
    <a href="{{ route('employees.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded">Add Employee</a>
</div>

<form method="GET" action="{{ route('employees.index') }}" class="mb-4 flex gap-2">
    <input type="text" name="search" value="{{ request('search') }}"
           placeholder="Search by name or email"
           class="flex-1 border rounded px-3 py-2">
    <button class="bg-gray-800 text-white px-4 py-2 rounded">Search</button>
    @if (request('search'))
        <a href="{{ route('employees.index') }}" class="px-4 py-2 border rounded">Clear</a>
    @endif
</form>

<div class="bg-white shadow rounded overflow-x-auto">
    <table class="w-full text-left">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="p-3">Name</th>
                <th class="p-3">Email</th>
                <th class="p-3">Department</th>
                <th class="p-3">Position</th>
                <th class="p-3">Hired</th>
                <th class="p-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employees as $employee)
                <tr class="border-b">
                    <td class="p-3">{{ $employee->name }}</td>
                    <td class="p-3">{{ $employee->email }}</td>
                    <td class="p-3">{{ $employee->department->name }}</td>
                    <td class="p-3">{{ $employee->position->title }}</td>
                    <td class="p-3">{{ $employee->hire_date->format('d M Y') }}</td>
                    <td class="p-3 text-right whitespace-nowrap">
                        <a href="{{ route('employees.edit', $employee) }}"
                           class="text-blue-600 mr-3">Edit</a>
                        <form action="{{ route('employees.destroy', $employee) }}" method="POST"
                              class="inline" onsubmit="return confirm('Delete this employee?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="p-3 text-center text-gray-500">No employees found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $employees->links() }}</div>
@endsection