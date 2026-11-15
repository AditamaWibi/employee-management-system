@extends('layouts.main')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Position</h1>

<form action="{{ route('positions.update', $position) }}" method="POST" class="bg-white shadow rounded p-6">
    @csrf
    @method('PUT')
    @include('positions._form')
</form>
@endsection