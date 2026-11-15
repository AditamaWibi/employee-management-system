@extends('layouts.main')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Dashboard</h1>
    <div class="flex gap-2">
        <a href="{{ route('employees.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add Employee</a>
        <a href="{{ route('departments.create') }}" class="bg-white border px-4 py-2 rounded">Add Department</a>
        <a href="{{ route('positions.create') }}" class="bg-white border px-4 py-2 rounded">Add Position</a>
    </div>
</div>

{{-- Summary cards --}}
<div class="grid gap-4 grid-cols-2 md:grid-cols-4 mb-6">
    <a href="{{ route('employees.index') }}" class="bg-white shadow rounded p-4 hover:shadow-md">
        <p class="text-sm text-gray-500">Total Employees</p>
        <p class="text-3xl font-bold">{{ $totalEmployees }}</p>
    </a>
    <a href="{{ route('departments.index') }}" class="bg-white shadow rounded p-4 hover:shadow-md">
        <p class="text-sm text-gray-500">Departments</p>
        <p class="text-3xl font-bold">{{ $totalDepartments }}</p>
    </a>
    <a href="{{ route('positions.index') }}" class="bg-white shadow rounded p-4 hover:shadow-md">
        <p class="text-sm text-gray-500">Positions</p>
        <p class="text-3xl font-bold">{{ $totalPositions }}</p>
    </a>
    <div class="bg-white shadow rounded p-4">
        <p class="text-sm text-gray-500">New Hires ({{ now()->format('M Y') }})</p>
        <p class="text-3xl font-bold">{{ $newHiresThisMonth }}</p>
    </div>
</div>

<div class="grid gap-6 md:grid-cols-2">
    {{-- Employees per department --}}
    <div class="bg-white shadow rounded p-4">
        <h2 class="text-lg font-semibold mb-3">Employees per Department</h2>
        @forelse ($departments as $department)
            <div class="mb-3">
                <div class="flex justify-between text-sm mb-1">
                    <span>{{ $department->name }}</span>
                    <span class="font-medium">{{ $department->employees_count }}</span>
                </div>
                <div class="w-full bg-gray-200 rounded h-2">
                    <div class="bg-blue-600 h-2 rounded"
                         style="width: {{ ($department->employees_count / $maxDepartmentCount) * 100 }}%"></div>
                </div>
            </div>
        @empty
            <p class="text-gray-500">No departments yet.</p>
        @endforelse
    </div>

    {{-- Recent hires --}}
    <div class="bg-white shadow rounded p-4">
        <h2 class="text-lg font-semibold mb-3">Recent Hires</h2>
        <table class="w-full text-left text-sm">
            <thead class="border-b text-gray-500">
                <tr>
                    <th class="py-2">ID</th>
                    <th class="py-2">Name</th>
                    <th class="py-2">Hired</th>
                    <th class="py-2"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentHires as $employee)
                    <tr class="border-b">
                        <td class="py-2 font-mono">{{ $employee->employee_number }}</td>
                        <td class="py-2">
                            {{ $employee->name }}
                            <div class="text-xs text-gray-500">
                                {{ $employee->position->title }}, {{ $employee->department->name }}
                            </div>
                        </td>
                        <td class="py-2 whitespace-nowrap">{{ $employee->hire_date->format('d M Y') }}</td>
                        <td class="py-2 text-right">
                            <a href="{{ route('employees.edit', $employee) }}" class="text-blue-600">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="py-3 text-center text-gray-500">No employees yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection