<div class="mb-4">
    <label for="name" class="block mb-1 font-medium">Name</label>
    <input type="text" id="name" name="name"
           value="{{ old('name', $department->name ?? '') }}"
           class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror">
    @error('name')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="flex gap-3">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
    <a href="{{ route('departments.index') }}" class="px-4 py-2 border rounded">Cancel</a>
</div>