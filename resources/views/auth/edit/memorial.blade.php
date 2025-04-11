<x-admin-layout  :title="'Edit a Memorial'">
    <section class="p-6 md:p-12 container">
        <h2 class="font-semibold text-4xl my-12">Edit a Memorial</h2>
    
        @if(session('success'))
            <div class="bg-green-700 text-white text-center rounded-xl p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif
    
        <form method="GET" action="{{ route('auth.edit.memorial') }}" class="mb-6">
            <label for="select-memorial" class="block w-full">Select Memorial</label>
            <select id="select-memorial" name="memorial_id" class="border border-gray-800 p-2 w-full rounded-xl bg-white" onchange="this.form.submit()">
                <option value="">Select a Memorial</option>
                @foreach ($memorials as $memorialOption)
                    <option value="{{ $memorialOption->id }}" {{ $memorial && $memorial->id == $memorialOption->id ? 'selected' : '' }}>
                        {{ $memorialOption->first_name }} {{ $memorialOption->last_name }}
                    </option>
                @endforeach
            </select>
            <small>Select the memorial you would like to edit from the available list.</small>
        </form>
    
        @if ($memorial)
            <form action="{{ route('memorial.update', $memorial->id) }}" method="POST">
                @csrf
                @method('PUT')
    
                <div class="mb-6">
                    <label for="first_name" class="block w-full">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="border border-gray-800 p-2 w-full rounded-xl bg-white" value="{{ old('first_name', $memorial->first_name) }}" required>
                    <small>Please enter the first name of the individual being memorialized.</small>
                </div>
    
                <div class="mb-6">
                    <label for="last_name" class="block w-full">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="border border-gray-800 p-2 w-full rounded-xl bg-white" value="{{ old('last_name', $memorial->last_name) }}" required>
                    <small>Please enter the last name of the individual being memorialized.</small>
                </div>
    
                <div class="mb-6">
                    <label for="biography" class="block w-full">Biography</label>
                    <textarea id="biography" name="biography" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>{{ old('biography', $memorial->biography) }}</textarea>
                    <small>Provide a short biography of the individual. This helps to capture their life story.</small>
                </div>
    
                <div class="mb-6">
                    <label for="birth_year" class="block w-full">Birth Year</label>
                    <input type="number" id="birth_year" name="birth_year" class="border border-gray-800 p-2 w-full rounded-xl bg-white" value="{{ old('birth_year', $memorial->birth_year) }}">
                    <small>Enter the year the individual was born. This is optional.</small>
                </div>
    
                <div class="mb-6">
                    <label for="death_year" class="block w-full">Death Year</label>
                    <input type="number" id="death_year" name="death_year" class="border border-gray-800 p-2 w-full rounded-xl bg-white" value="{{ old('death_year', $memorial->death_year) }}">
                    <small>Enter the year the individual passed away. If there is no birth year, leave this field blank.</small>
                </div>
    
                <div class="mb-6">
                    <label for="tag_id" class="block w-full">Career Tag</label>
                    <select id="tag_id" name="tag_id" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>
                        <option value="">Select a Tag</option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" {{ old('tag_id', $memorial->tag_id) == $tag->id ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    <small>Select the tag that corresponds to the individual's career.</small>
                </div>
    
                <div>
                    <input type="submit" value="Update Memorial" class="cursor-pointer bg-sky-900 text-white p-2 rounded-xl hover:bg-sky-600 w-full">
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
    </section>
</x-admin-layout>
