<x-admin-layout>
    <h2>Edit a Testimonial</h2>

    @if(session('success'))
        <div class="alert alert-success bg-green-500 text-white p-4 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('auth.edit.testimonial') }}" class="mb-4">
        <label for="select-testimonial" class="block">Select Testimonial</label>
        <select id="select-testimonial" name="testimonial_video_id" class="w-full" onchange="this.form.submit()">
            <option value="">Select a Testimonial</option>
            @foreach ($testimonialVideos as $testimonialOption)
                <option value="{{ $testimonialOption->id }}" {{ $testimonial_video && $testimonial_video->id == $testimonialOption->id ? 'selected' : '' }}>
                    {{ $testimonialOption->title }}
                </option>
            @endforeach
        </select>
        <small class="text-gray-600">Select the testimonial you would like to edit from the available list.</small>
    </form>

    @if ($testimonial_video)
        <form action="{{ route('auth.create.testimonial') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="title" class="block">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" class="border p-2 w-full" required>
                <small class="text-gray-600">Provide a title for the testimonial.</small>
            </div>

            <div class="mb-4">
                <label for="description" class="block">Description</label>
                <textarea id="description" name="description" class="border p-2 w-full" required>{{ old('description') }}</textarea>
                <small class="text-gray-600">Write a brief description or narrative for the testimonial.</small>
            </div>

            <div class="mb-4">
                <label for="url" class="block">YouTube Video URL</label>
                <input type="url" id="url" name="url" value="{{ old('url') }}" class="border p-2 w-full" required>
                <small class="text-gray-600">Provide the URL to a YouTube video where the testimonial is available. The video will not work if it's not a YouTube video.</small>
            </div>

            <div class="mb-4">
                <label for="tag_id" class="block">Tag</label>
                <select id="tag_id" name="tag_id" class="border p-2 w-full" required>
                    <option value="">Select a Tag</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ old('tag_id') == $tag->id ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                <small class="text-gray-600">Select the tag that best categorizes the testimonial.</small>
            </div>

            <div class="mb-6">
                <input type="submit" value="Add Testimonial" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
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
