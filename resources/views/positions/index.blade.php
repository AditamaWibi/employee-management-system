@extends('layouts.main')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Position</h1>
    <a href="{{ route('positions.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded">Add Position</a>
</div>

<div class="bg-white shadow rounded overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="p-3">Title</th>
                <th class="p-3">Employees</th>
                <th class="p-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($positions as $position)
                <tr class="border-b">
                    <td class="p-3">{{ $position->title }}</td>
                    <td class="p-3">{{ $position->employees_count }}</td>
                    <td class="p-3 text-right">
                        <a href="{{ route('positions.edit', $position) }}"
                           class="text-blue-600 mr-3">Edit</a>
                        <form action="{{ route('positions.destroy', $position) }}" method="POST"
                              class="inline" onsubmit="return confirm('Delete this position?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="p-3 text-center text-gray-500">No positions yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $positions->links() }}</div>
@endsection