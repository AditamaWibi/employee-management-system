<div class="grid gap-4 md:grid-cols-2">
    @isset($employee)
    <div>
        <label class="block mb-1 font-medium">Employee ID</label>
        <input type="text" value="{{ $employee->employee_number }}" readonly
               class="w-full border rounded px-3 py-2 bg-gray-100 font-mono">
    </div>
    @endisset

    <div>
        <label for="name" class="block mb-1 font-medium">Name</label>
        <input type="text" id="name" name="name"
               value="{{ old('name', $employee->name ?? '') }}"
               class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror">
        @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="email" class="block mb-1 font-medium">Email</label>
        <input type="email" id="email" name="email"
               value="{{ old('email', $employee->email ?? '') }}"
               class="w-full border rounded px-3 py-2 @error('email') border-red-500 @enderror">
        @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="phone_number" class="block mb-1 font-medium">Phone</label>
        <input type="text" id="phone_number" name="phone_number"
               value="{{ old('phone_number', $employee->phone_number ?? '') }}"
               class="w-full border rounded px-3 py-2 @error('phone_number') border-red-500 @enderror">
        @error('phone_number') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="hire_date" class="block mb-1 font-medium">Hire Date</label>
        <input type="date" id="hire_date" name="hire_date"
               value="{{ old('hire_date', isset($employee) ? $employee->hire_date->format('Y-m-d') : '') }}"
               class="w-full border rounded px-3 py-2 @error('hire_date') border-red-500 @enderror">
        @error('hire_date') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="department_id" class="block mb-1 font-medium">Department</label>
        <select id="department_id" name="department_id"
                class="w-full border rounded px-3 py-2 @error('department_id') border-red-500 @enderror">
            <option value="">Select a department</option>
            @foreach ($departments as $department)
                <option value="{{ $department->id }}"
                    @selected(old('department_id', $employee->department_id ?? '') == $department->id)>
                    {{ $department->name }}
                </option>
            @endforeach
        </select>
        @error('department_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="position_id" class="block mb-1 font-medium">Position</label>
        <select id="position_id" name="position_id"
                class="w-full border rounded px-3 py-2 @error('position_id') border-red-500 @enderror">
            <option value="">Select a position</option>
            @foreach ($positions as $position)
                <option value="{{ $position->id }}"
                    @selected(old('position_id', $employee->position_id ?? '') == $position->id)>
                    {{ $position->title }}
                </option>
            @endforeach
        </select>
        @error('position_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="flex gap-3 mt-6">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
    <a href="{{ route('employees.index') }}" class="px-4 py-2 border rounded">Cancel</a>
</div>