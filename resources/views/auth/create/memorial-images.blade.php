<x-admin-layout>
    <h2>Add a Memorial Image</h2>

    @if(session('success'))
        <div class="alert alert-success bg-green-500 text-white p-4 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <p class="my-8">Note: Before adding a new memorial image, please verify that the memorial is listed in the database. You can check this in the 'Select a Memorial' dropdown. If their name is not listed, visit the <a href="/auth/create/memorial" class="underline">Create Memorial</a> page to add them to the database.</p>

    <form action="{{ route('memorial-images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="memorial_id" class="block">Memorial</label>
            <select name="memorial_id" id="memorial_id" class="border p-2 w-full" required>
                <option value="">Select a Memorial</option>
                @foreach ($memorials as $memorial)
                    <option value="{{ $memorial->id }}" {{ old('memorial_id') == $memorial->id ? 'selected' : '' }}>
                        {{ $memorial->first_name }} {{ $memorial->last_name }}
                    </option>
                @endforeach
            </select>
            <small class="text-gray-600">Please select a memorial from the list that the image will be associated with.</small>
        </div>

        <div class="mb-4">
            <label for="filename" class="block">Memorial Image</label>
            <input type="file" name="filename" id="filename" class="border p-2 w-full bg-white" required>
            <small class="text-gray-600">The image must not exceed 2MB and must be in one of the following formats: jpeg, png, jpg, gif, svg, or webp.</small>
        </div>

        <div class="mb-4">
            <label for="description" class="block">Description</label>
            <textarea name="description" id="description" class="border p-2 w-full" required>{{ old('description') }}</textarea>
            <small class="text-gray-600">Please provide a brief description. This is required for accessibility purposes.</small>
        </div>

        <div class="mb-6">
            <input type="submit" value="Create Memorial Image" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
        </div>
    </form>

    @if ($errors->any())
        <div class="text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</x-admin-layout>
