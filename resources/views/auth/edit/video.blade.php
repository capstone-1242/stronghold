<x-admin-layout>
    <section class="p-6 md:p-12">
        <h2 class="font-semibold text-4xl my-12">Edit a Video</h2>
    
        @if(session('success'))
            <div class="bg-green-700 text-white text-center rounded-xl p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif
    
        <form method="GET" action="{{ route('auth.edit.video') }}" class="mb-6">
            <label for="select-video" class="block w-full">Select Video</label>
            <select id="select-video" class="border border-gray-800 p-2 w-full rounded-xl bg-white" name="video_id" onchange="this.form.submit()">
                <option value="">Select a Video</option>
                @foreach ($videos as $videoOption)
                    <option value="{{ $videoOption->id }}" {{ $video && $video->id == $videoOption->id ? 'selected' : '' }}>
                        {{ $videoOption->title }}
                    </option>
                @endforeach
            </select>
            <small>Select the video you would like to edit from the available list.</small>
        </form>
    
        @if ($video)
            <form action="{{ route('video.update', $video->id) }}" method="POST">
                @csrf
                @method('PUT')
    
                <div class="mb-6">
                    <label for="title" class="block w-full">Title</label>
                    <input type="text" id="title" name="title" class="border border-gray-800 p-2 w-full rounded-xl bg-white" value="{{ old('title', $video->title) }}" required>
                    <small>Please enter the title of the video.</small>
                </div>
    
                <div class="mb-6">
                    <label for="description" class="block w-full">Description</label>
                    <textarea id="description" name="description" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>{{ old('description', $video->description) }}</textarea>
                    <small>Enter a description for the video. This will help users understand the video's context.</small>
                </div>
    
                <div class="mb-6">
                    <label for="url" class="block w-full">Video URL</label>
                    <input type="url" id="url" name="url" class="border border-gray-800 p-2 w-full rounded-xl bg-white" value="{{ old('url', $video->url) }}" required>
                    <small>Enter the URL of the YouTube video. The video will not work on the website if it's not on YouTube.</small>
                </div>
    
                <div class="mb-6">
                    <label for="author_id" class="block w-full">Author</label>
                    <select id="author_id" name="author_id" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>
                        <option value="">Select an Author</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" {{ old('author_id', $video->author_id) == $author->id ? 'selected' : '' }}>
                                {{ $author->first_name }} {{ $author->last_name }}
                            </option>
                        @endforeach
                    </select>
                    <small>Please select the presenter from the list that the video will be associated with.</small>
                </div>
    
                <div>
                    <input type="submit" value="Update Video" class="bg-sky-900 text-white p-2 rounded-xl hover:bg-sky-600 w-full">
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
