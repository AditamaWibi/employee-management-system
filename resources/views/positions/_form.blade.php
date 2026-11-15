<div class="mb-4">
    <label for="title" class="block mb-1 font-medium">Title</label>
    <input type="text" id="title" name="title"
           value="{{ old('title', $position->title ?? '') }}"
           class="w-full border rounded px-3 py-2 @error('title') border-red-500 @enderror">
    @error('title')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
    <label for="base_salary" class="block mb-1 font-medium">Base Salary</label>
    <input type="number" id="base_salary" name="base_salary"
            value="{{ old('base_salary', $position->base_salary ?? 0) }}"
            class="w-full border rounded px-3 py-2 @error('base_salary')
                border-red-500
            @enderror">
    @error('base_salary')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="flex gap-3">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
    <a href="{{ route('positions.index') }}" class="px-4 py-2 border rounded">Cancel</a>
</div>