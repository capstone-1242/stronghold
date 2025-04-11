<x-admin-layout :title="'Create a Memorial'">
    <section class="p-6 md:p-12 container">
        <h2 class="font-semibold text-4xl my-12">Create a Memorial</h2>
    
        <p class="my-8 note"><strong>Note:</strong> Once you've created a memorial, visit the <a href="/auth/create/memorial-images" class="underline">Add Memorial Images</a> page to add images to the new memorial.</p>
    
        @if(session('success'))
            <div class="bg-green-700 text-white text-center rounded-xl p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif
    
        <form action="{{ route('memorial.store') }}" method="POST">
            @csrf
    
            <div class="mb-6">
                <label for="first_name" class="block w-full">First Name</label>
                <input type="text" name="first_name" id="first_name" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required value="{{ old('first_name') }}">
                <small>Please enter the first name of the individual being memorialized.</small>
            </div>
    
            <div class="mb-6">
                <label for="last_name" class="block w-full">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required value="{{ old('last_name') }}">
                <small>Please enter the last name of the individual being memorialized.</small>
            </div>
    
            <div class="mb-6">
                <label for="biography" class="block w-full">Biography</label>
                <textarea name="biography" id="biography" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>{{ old('biography') }}</textarea>
                <small>Provide a short biography of the individual. This helps to capture their life story.</small>
            </div>
    
            <div class="mb-6">
                <label for="birth_year" class="block w-full">Birth Year</label>
                <input type="number" name="birth_year" id="birth_year" class="border border-gray-800 p-2 w-full rounded-xl bg-white" value="{{ old('birth_year') }}">
                <small>Enter the year the individual was born. This is optional.</small>
            </div>
    
            <div class="mb-6">
                <label for="death_year" class="block w-full">Death Year</label>
                <input type="number" name="death_year" id="death_year" class="border border-gray-800 p-2 w-full rounded-xl bg-white" value="{{ old('death_year') }}">
                <small>Enter the year the individual passed away. If there is no birth year, leave this field blank.</small>
            </div>
    
            <div class="mb-6">
                <label for="tag_id" class="block w-full">Career Tag</label>
                <select name="tag_id" id="tag_id" class="border border-gray-800 p-2 w-full rounded-xl bg-white">
                    <option value="">Select a Tag</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ old('tag_id') == $tag->id ? 'selected' : '' }}>{{ $tag->name }}</option>
                    @endforeach
                </select>
                <small>Select the tag that corresponds to the individual's career.</small>
            </div>
    
            <div class="mb-6">
                <input type="submit" value="Create Memorial" class="cursor-pointer bg-sky-900 text-white p-2 rounded-xl hover:bg-sky-600 w-full">
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
    </section>
</x-admin-layout>
