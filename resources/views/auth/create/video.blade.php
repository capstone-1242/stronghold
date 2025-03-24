<x-admin-layout>
    <h2>Create a Video</h2>

    @if(session('success'))
        <div class="alert alert-success bg-green-500 text-white p-4 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <p class="my-8">Note: Before creating a new video, please verify that the presenter is listed in the database. You can check this in the 'Select a Presenter' dropdown. If their name is not listed, visit the <a href="/auth/create/presenters" class="underline">Create Presenter</a> page to add them to the database.</p>

    <form action="{{ route('video.store') }}" method="POST">
        @csrf
        
        <div class="mb-4">
            <label for="title" class="block">Title</label>
            <input type="text" id="title" name="title" class="w-full" value="{{ old('title') }}" required>
            <small class="text-gray-600">Please enter the title of the video.</small>
        </div>
    
        <div class="mb-4">
            <label for="description" class="block">Description</label>
            <textarea id="description" name="description" class="w-full" required>{{ old('description') }}</textarea>
            <small class="text-gray-600">Enter a description for the video. This will help users understand the video's context.</small>
        </div>
    
        <div class="mb-4">
            <label for="url" class="block">Youtube Video URL</label>
            <input type="url" id="url" name="url" class="w-full" value="{{ old('url') }}" required>
            <small class="text-gray-600">Enter the URL of the YouTube video. The video will not work on the website if it's not on YouTube.</small>
        </div>
    
        <div class="mb-4">
            <label for="author_id" class="block">Presenter</label>
            <select id="author_id" name="author_id" class="w-full" required>
                <option value="">Select a Presenter</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                        {{ $author->first_name }} {{ $author->last_name }}
                    </option>
                @endforeach
            </select>
            <small class="text-gray-600">Please select the presenter from the list that the video will be associated with.</small>
        </div>

        <div class="mb-6">
            <input type="submit" value="Add Video" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
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
