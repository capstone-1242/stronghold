<x-admin-layout>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <p>Note: Before creating a new video, please verify that the presenter is listed in the database. You can check this in the 'Select a Presenter' dropdown. If their name is not listed, visit the <a href="/auth/create/presenters" class="underline">Create Presenter</a> page to add them to the database.</p>

    <form action="{{ route('video.store') }}" method="POST">
        @csrf
        
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>
    
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ old('description') }}</textarea>
        </div>
    
        <div>
            <label for="url">Youtube Video URL</label>
            <input type="url" id="url" name="url" value="{{ old('url') }}" required>
        </div>
    
        <div>
            <label for="author_id">Presenter</label>
            <select id="author_id" name="author_id" required>
                <option value="">Select a Presenter</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                        {{ $author->first_name }} {{ $author->last_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <input type="submit" value="Add Video">
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
