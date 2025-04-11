<x-admin-layout :title="'Create a Memorial Image'">
   <section class="p-6 md:p-12 container">
        <h2 class="font-semibold text-4xl my-12">Create a Memorial Image</h2>
    
        @if(session('success'))
            <div class="bg-green-700 text-white text-center rounded-xl p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif
    
        <p class="my-8 note"><strong>Note:</strong> Before adding a new image, make sure the memorial is listed in the database. You can check this in the 'Select a Memorial' dropdown. If it’s not there, go to the <a href="/auth/create/memorial" class="underline">Create Memorial</a> page to add it.</p>
    
        <form action="{{ route('memorial-images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    
            <div class="mb-6">
                <label for="memorial_id" class="block w-full">Memorial</label>
                <select name="memorial_id" id="memorial_id" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>
                    <option value="">Select a Memorial</option>
                    @foreach ($memorials as $memorial)
                        <option value="{{ $memorial->id }}" {{ old('memorial_id') == $memorial->id ? 'selected' : '' }}>
                            {{ $memorial->first_name }} {{ $memorial->last_name }}
                        </option>
                    @endforeach
                </select>
                <small>Please select a memorial from the list that the image will be associated with.</small>
            </div>
    
            <div class="mb-6">
                <label for="filename" class="block w-full">Memorial Image</label>
                <input type="file" name="filename" id="filename" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>
                <small>The image must not exceed 2MB and must be in one of the following formats: jpeg, png, jpg, gif, or svg.</small>
            </div>
    
            <div class="mb-6">
                <label for="description" class="block w-full">Description</label>
                <textarea name="description" id="description" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>{{ old('description') }}</textarea>
                <small>Please provide a brief description. This is required for accessibility purposes.</small>
            </div>
    
            <div class="mb-6">
                <input type="submit" value="Create Memorial Image" class="cursor-pointer bg-sky-900 text-white p-2 rounded-xl hover:bg-sky-600 w-full">
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
