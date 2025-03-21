<x-admin-layout>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('auth.edit.testimonial') }}">
        <label for="select-testimonial">Select Testimonial:</label>
        <select id="select-testimonial" name="testimonial_video_id" onchange="this.form.submit()">
            <option value="">Select a Testimonial</option>
            @foreach ($testimonialVideos as $testimonialOption)
                <option value="{{ $testimonialOption->id }}" {{ $testimonial_video && $testimonial_video->id == $testimonialOption->id ? 'selected' : '' }}>
                    {{ $testimonialOption->title }}
                </option>
            @endforeach
        </select>
    </form>

    @if ($testimonial_video)
        <form action="{{ route('testimonial.update', $testimonial_video->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $testimonial_video->title) }}" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required>{{ old('description', $testimonial_video->description) }}</textarea>

            <label for="url">Testimonial URL:</label>
            <input type="url" id="url" name="url" value="{{ old('url', $testimonial_video->url) }}" required>

            <label for="tag_id">Tag:</label>
            <select id="tag_id" name="tag_id" required>
                <option value="">Select a Tag</option>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" {{ old('tag_id', $testimonial_video->tag_id) == $tag->id ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>

            <input type="submit" value="Update Testimonial">
        </form>
    @else
        <p>Select a testimonial to edit.</p>
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
