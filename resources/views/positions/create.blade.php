@extends('layouts.main')

@section('content')
<h1 class="text-2xl font-bold mb-4">Add Position</h1>

<form action="{{ route('positions.store') }}" method="POST" class="bg-white shadow rounded p-6">
    @csrf
    @include('positions._form')
</form>
@endsection