<x-admin-layout>
    <h2 class="font-semibold text-4xl my-12">Edit a Testimonial</h2>

    @if(session('success'))
        <div class="bg-green-700 text-white text-center rounded-xl p-4 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('auth.edit.testimonial') }}" class="mb-6">
        <label for="select-testimonial" class="block w-full">Select Testimonial</label>
        <select id="select-testimonial" name="testimonial_video_id" class="border border-gray-800 p-2 w-full rounded-xl" onchange="this.form.submit()">
            <option value="">Select a Testimonial</option>
            @foreach ($testimonialVideos as $testimonialOption)
                <option value="{{ $testimonialOption->id }}" {{ $testimonial_video && $testimonial_video->id == $testimonialOption->id ? 'selected' : '' }}>
                    {{ $testimonialOption->title }}
                </option>
            @endforeach
        </select>
        <small>Select the testimonial you would like to edit from the available list.</small>
    </form>

    @if ($testimonial_video)
        <form action="{{ route('testimonial.update', $testimonial_video->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="title" class="block w-full">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $testimonial_video->title) }}" class="border border-gray-800 p-2 w-full rounded-xl" required>
                <small>Provide a title for the testimonial.</small>
            </div>

            <div class="mb-6">
                <label for="description" class="block w-full">Description</label>
                <textarea id="description" name="description" class="border border-gray-800 p-2 w-full rounded-xl" required>{{ old('description', $testimonial_video->description) }}</textarea>
                <small>Write a brief description or narrative for the testimonial.</small>
            </div>

            <div class="mb-6">
                <label for="url" class="block w-full">YouTube Video URL</label>
                <input type="url" id="url" name="url" value="{{ old('url', $testimonial_video->url) }}" class="border border-gray-800 p-2 w-full rounded-xl" required>
                <small>Provide the URL to a YouTube video where the testimonial is available. The video will not work if it's not a YouTube video.</small>
            </div>

            <div class="mb-6">
                <label for="tag_id" class="block w-full">Tag</label>
                <select id="tag_id" name="tag_id" class="border border-gray-800 p-2 w-full rounded-xl" required>
                    <option value="">Select a Tag</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ old('tag_id', $testimonial_video->tag_id) == $tag->id ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                <small>Select the tag that best categorizes the testimonial.</small>
            </div>

            <div class="mb-6">
                <input type="submit" value="Update Testimonial" class="bg-sky-900 text-white p-2 rounded-xl hover:bg-sky-600 w-full">
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
