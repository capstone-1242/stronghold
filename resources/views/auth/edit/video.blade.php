<x-admin-layout>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('auth.edit.video') }}">
        <label for="select-video">Select Video:</label>
        <select id="select-video" name="video_id" onchange="this.form.submit()">
            <option value="">Select a Video</option>
            @foreach ($videos as $videoOption)
                <option value="{{ $videoOption->id }}" {{ $video && $video->id == $videoOption->id ? 'selected' : '' }}>
                    {{ $videoOption->title }}
                </option>
            @endforeach
        </select>
    </form>

    @if ($video)
        <form action="{{ route('video.update', $video->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $video->title) }}" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required>{{ old('description', $video->description) }}</textarea>

            <label for="url">Video URL:</label>
            <input type="url" id="url" name="url" value="{{ old('url', $video->url) }}" required>

            <label for="author_id">Author:</label>
            <select id="author_id" name="author_id" required>
                <option value="">Select an Author</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}" {{ old('author_id', $video->author_id) == $author->id ? 'selected' : '' }}>
                        {{ $author->first_name }} {{ $author->last_name }}
                    </option>
                @endforeach
            </select>

            <input type="submit" value="Update Video">
        </form>
    @else
        <p>Select a video to edit.</p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</x-admin-layout>
