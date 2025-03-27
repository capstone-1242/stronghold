@php
    use App\Models\Tag;
    $tags = \App\Models\Tag::all(); 
    $selectedTags = request()->input('tags', []);
@endphp

<x-admin-layout>
    <h2 class="font-semibold text-4xl my-12">Create a Testimonial</h2>

    @if(session('success'))
        <div class="bg-green-700 text-white text-center rounded-xl p-4 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('auth.create.testimonial') }}" method="POST">
        @csrf

        <div class="mb-6">
            <label for="title" class="block w-full">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" class="border border-gray-800 p-2 w-full rounded-xl" required>
            <small>Provide a title for the testimonial.</small>
        </div>

        <div class="mb-6">
            <label for="description" class="block w-full">Description</label>
            <textarea id="description" name="description" class="border border-gray-800 p-2 w-full rounded-xl" required>{{ old('description') }}</textarea>
            <small>Write a brief description or narrative for the testimonial.</small>
        </div>

        <div class="mb-6">
            <label for="url" class="block w-full">YouTube Video URL</label>
            <input type="url" id="url" name="url" value="{{ old('url') }}" class="border border-gray-800 p-2 w-full rounded-xl" required>
            <small>Provide the URL to a YouTube video where the testimonial is available. The video will not work if it's not a YouTube video.</small>
        </div>

        <div class="mb-6">
            <label for="tag_id" class="block w-full">Tag</label>
            <select id="tag_id" name="tag_id" class="border border-gray-800 p-2 w-full rounded-xl" required>
                <option value="">Select a Tag</option>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" {{ old('tag_id') == $tag->id ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            <small>Select the tag that best categorizes the testimonial.</small>
        </div>

        <div class="mb-6">
            <input type="submit" value="Add Testimonial" class="bg-sky-900 text-white p-2 rounded-xl hover:bg-sky-600 w-full">
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
