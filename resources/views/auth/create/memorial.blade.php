<x-admin-layout>
    <h2>Create a Memorial</h2>

    <p class="my-8">Note: Upon the completion of creating a memorial, visit the <a href="/auth/create/memorial-images" class="underline">Add Memorial Images</a> page to add corresponding images to this memorial.</p>

    @if(session('success'))
        <div class="alert alert-success bg-green-500 text-white p-4 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('memorial.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="first_name" class="block">First Name</label>
            <input type="text" name="first_name" id="first_name" class="border p-2 w-full" required value="{{ old('first_name') }}">
            <small class="text-gray-600">Please enter the first name of the individual being memorialized.</small>
        </div>

        <div class="mb-4">
            <label for="last_name" class="block">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="border p-2 w-full" required value="{{ old('last_name') }}">
            <small class="text-gray-600">Please enter the last name of the individual being memorialized.</small>
        </div>

        <div class="mb-4">
            <label for="biography" class="block">Biography</label>
            <textarea name="biography" id="biography" class="border p-2 w-full" required>{{ old('biography') }}</textarea>
            <small class="text-gray-600">Provide a short biography of the individual. This helps to capture their life story.</small>
        </div>

        <div class="mb-4">
            <label for="birth_year" class="block">Birth Year</label>
            <input type="number" name="birth_year" id="birth_year" class="border p-2 w-full" value="{{ old('birth_year') }}">
            <small class="text-gray-600">Enter the year the individual was born. This is optional.</small>
        </div>

        <div class="mb-4">
            <label for="death_year" class="block">Death Year</label>
            <input type="number" name="death_year" id="death_year" class="border p-2 w-full" value="{{ old('death_year') }}">
            <small class="text-gray-600">Enter the year the individual passed away. If there is no birth year, leave this field blank.</small>
        </div>

        <div class="mb-4">
            <label for="tag_id" class="block">Tag</label>
            <select name="tag_id" id="tag_id" class="border p-2 w-full">
                <option value="">Select a Tag</option>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" {{ old('tag_id') == $tag->id ? 'selected' : '' }}>{{ $tag->name }}</option>
                @endforeach
            </select>
            <small class="text-gray-600">Select the tag that corresponds to the individual's career.</small>
        </div>

        <div class="mb-6">
            <input type="submit" value="Create Memorial" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
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
