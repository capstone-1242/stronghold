<x-admin-layout>
    <h2>Edit a Memorial</h2>

    @if(session('success'))
        <div class="alert alert-success bg-green-500 text-white p-4 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('auth.edit.memorial') }}">
        <label for="select-memorial" class="block">Select Memorial:</label>
        <select id="select-memorial" name="memorial_id" class="w-full" onchange="this.form.submit()">
            <option value="">Select a Memorial</option>
            @foreach ($memorials as $memorialOption)
                <option value="{{ $memorialOption->id }}" {{ $memorial && $memorial->id == $memorialOption->id ? 'selected' : '' }}>
                    {{ $memorialOption->first_name }} {{ $memorialOption->last_name }}
                </option>
            @endforeach
        </select>
        <small class="text-gray-600">Select the memorial you would like to edit from the available list.</small>
    </form>

    @if ($memorial)
        <form action="{{ route('memorial.update', $memorial->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="first_name" class="block">First Name</label>
                <input type="text" id="first_name" name="first_name" class="border p-2 w-full" value="{{ old('first_name', $memorial->first_name) }}" required>
                <small class="text-gray-600">Please enter the first name of the individual being memorialized.</small>
            </div>

            <div class="mb-4">
                <label for="last_name" class="block">Last Name</label>
                <input type="text" id="last_name" name="last_name" class="border p-2 w-full" value="{{ old('last_name', $memorial->last_name) }}" required>
                <small class="text-gray-600">Please enter the last name of the individual being memorialized.</small>
            </div>

            <div class="mb-4">
                <label for="biography" class="block">Biography</label>
                <textarea id="biography" name="biography" class="border p-2 w-full" required>{{ old('biography', $memorial->biography) }}</textarea>
                <small class="text-gray-600">Provide a short biography of the individual. This helps to capture their life story.</small>
            </div>

            <div class="mb-4">
                <label for="birth_year" class="block">Birth Year</label>
                <input type="number" id="birth_year" name="birth_year" class="border p-2 w-full" value="{{ old('birth_year', $memorial->birth_year) }}">
                <small class="text-gray-600">Enter the year the individual was born. This is optional.</small>
            </div>

            <div class="mb-4">
                <label for="death_year" class="block">Death Year</label>
                <input type="number" id="death_year" name="death_year" class="border p-2 w-full" value="{{ old('death_year', $memorial->death_year) }}">
                <small class="text-gray-600">Enter the year the individual passed away. If there is no birth year, leave this field blank.</small>
            </div>

            <div class="mb-4">
                <label for="tag_id" class="block">Tag</label>
                <select id="tag_id" name="tag_id" class="border p-2 w-full" required>
                    <option value="">Select a Tag</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ old('tag_id', $memorial->tag_id) == $tag->id ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                <small class="text-gray-600">Select the tag that corresponds to the individual's career.</small>
            </div>

            <div>
                <input type="submit" value="Update Memorial" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
            </div>
        </form>
    @endif

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
