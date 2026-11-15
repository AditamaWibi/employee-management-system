<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow mb-6">
        <div class="max-w-4x1 mx-auto px-4 py-3 flex gap-6">
            <a href="{{ route('departments.index') }}" class="font-semibold">Departments</a>
            <a href="{{ route('positions.index') }}" class="font-semibold">Positions</a>
            <a href="{{ route('employees.index') }}" class="font-semibold">Employees</a>
        </div>
    </nav>

    <main class="max-w-4x1 mx-auto px-4">
        @if (session('success'))
            <div class="mb-4 p-3 rounded bg-green-100 text-green-800">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="mb-4 p-3 rounded bg-red-100 text-red-800">{{ session('error') }}</div>
        @endif

        @yield('content')
    </main>
</body>
</html>