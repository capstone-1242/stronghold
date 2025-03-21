@php
    use App\Models\Tag;
    $tags = \App\Models\Tag::all(); 
    $selectedTags = request()->input('tags', []);
@endphp

<x-admin-layout>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('auth.create.testimonial') }}" method="POST">
        @csrf

        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="url">Youtube Video URL</label>
            <input type="url" id="url" name="url" value="{{ old('url') }}" required>
        </div>

        <div>
            <label for="tag_id">Tag</label>
            <select id="tag_id" name="tag_id" required>
                <option value="">Select a Tag</option>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" {{ old('tag_id') == $tag->id ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <input type="submit" value="Add Testimonial">
    </form>

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
