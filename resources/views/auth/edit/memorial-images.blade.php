<x-admin-layout>
    <section class="p-6 md:p-12">
        <h2 class="font-semibold text-4xl my-12">Edit a Memorial Image</h2>
    
        @if(session('success'))
            <div class="bg-green-700 text-white text-center rounded-xl p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif
    
        @if (!$memorialImage)
            <form method="GET" action="{{ route('auth.edit.memorial-images') }}" class="mb-6">
                <label for="select-memorial" class="block w-full">Select Memorial:</label>
                <select id="select-memorial" name="memorial_id" onchange="this.form.submit()" class="border border-gray-800 p-2 w-full rounded-xl bg-white">
                    <option value="">Select a Memorial</option>
                    @foreach ($memorials as $memorialOption)
                        <option value="{{ $memorialOption->id }}" {{ old('memorial_id', $selectedMemorial ? $selectedMemorial->id : '') == $memorialOption->id ? 'selected' : '' }}>
                            {{ $memorialOption->first_name }} {{ $memorialOption->last_name }}
                        </option>
                    @endforeach
                </select>
                <small>Please select the memorial to which the image belongs. Once selected, you will be able to choose an image for editing.</small>
            </form>
        @endif
    
        @if ($selectedMemorial)
            <form method="GET" action="{{ route('auth.edit.memorial-images') }}" class="mb-6">
                <label for="select-memorial-image" class="block w-full">Select Memorial Image:</label>
                <select id="select-memorial-image" name="memorial_image_id" onchange="this.form.submit()" class="border border-gray-800 p-2 w-full rounded-xl bg-white">
                    <option value="">Select a Memorial Image</option>
                    @if ($selectedMemorial->memorialImages->count() > 0)
                        @foreach ($selectedMemorial->memorialImages as $image)
                            <option value="{{ $image->id }}" {{ $memorialImage && $memorialImage->id == $image->id ? 'selected' : '' }}>
                                {{ $image->description ?: 'Image ' . ($loop->index + 1) }}
                            </option>
                        @endforeach
                    @else
                        <option value="">No images available</option>
                    @endif
                </select>
                <small>Select the memorial image you would like to edit from the available list.</small>
            </form>
        @endif
    
        @if ($memorialImage)
            <form action="{{ route('memorial-images.update', $memorialImage->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                <div class="mb-6">
                    <label for="current_image" class="block w-full font-semibold mb-2">Current Image</label>
                    <div>
                        <img src="{{ asset('storage/' . $memorialImage->filename) }}" alt="{{ $memorialImage->description }}" class="w-32 h-32 object-cover mb-2">
                    </div>
                </div>
    
                <div class="mb-6">
                    <label for="filename" class="block w-full">New Memorial Image</label>
                    <input type="file" name="filename" id="filename" class="border border-gray-800 p-2 w-full rounded-xl bg-white">
                    <small>You can upload a new image to replace the existing one. If no new image is uploaded, the current image will remain unchanged.</small>
                </div>
    
                <div class="mb-6">
                    <label for="description" class="block w-full">Description</label>
                    <textarea name="description" id="description" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>{{ old('description', $memorialImage->description) }}</textarea>
                    <small>Please provide a brief description. This is required for accessibility purposes.</small>
                </div>
    
                <div class="mb-6">
                    <label for="memorial_id" class="block w-full">Memorial</label>
                    <select name="memorial_id" id="memorial_id" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>
                        <option value="">Select a Memorial</option>
                        @foreach ($memorials as $memorial)
                            <option value="{{ $memorial->id }}" {{ old('memorial_id', $memorialImage->memorial_id) == $memorial->id ? 'selected' : '' }}>
                                {{ $memorial->first_name }} {{ $memorial->last_name }}
                            </option>
                        @endforeach
                    </select>
                    <small>Please select a memorial from the list that the image will be associated with.</small>
                </div>
    
                <div class="mb-6">
                    <input type="submit" value="Update Memorial Image" class="bg-sky-900 text-white p-2 rounded-xl hover:bg-sky-600 w-full">
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
