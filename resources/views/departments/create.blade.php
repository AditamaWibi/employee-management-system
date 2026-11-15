@extends('layouts.main')

@section('content')
<h1 class="text-2xl font-bold mb-4">Add Department</h1>

<form action="{{ route('departments.store') }}" method="POST" class="bg-white shadow rounded p-6">
    @csrf
    @include('departments._form')
</form>
@endsection