@extends('layouts.main')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Department</h1>

<form action="{{ route('departments.update', $department) }}" method="POST" class="bg-white shadow rounded p-6">
    @csrf
    @method('PUT')
    @include('departments._form')
</form>
@endsection