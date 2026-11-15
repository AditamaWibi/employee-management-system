@extends('layouts.main')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Employee</h1>

<form action="{{ route('employees.update', $employee) }}" method="POST" class="bg-white shadow rounded p-6">
    @csrf
    @method('PUT')
    @include('employees._form')
</form>
@endsection