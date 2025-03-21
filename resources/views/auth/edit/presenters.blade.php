<x-admin-layout>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('auth.edit.presenters') }}">
        <label for="select-author">Select Presenter:</label>
        <select id="select-author" name="author_id" onchange="this.form.submit()">
            <option value="">Select a Presenter</option>
            @foreach ($authors as $authorOption)
                <option value="{{ $authorOption->id }}" {{ $author && $author->id == $authorOption->id ? 'selected' : '' }}>
                    {{ $authorOption->first_name }} {{ $authorOption->last_name }}
                </option>
            @endforeach
        </select>
    </form>

    @if ($author)
        <form action="{{ route('presenters.update', $author->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $author->first_name) }}" required>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $author->last_name) }}" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required>{{ old('description', $author->description) }}</textarea>

            <input type="submit" value="Update Presenter">
        </form>
    @else
        <p>Select a presenter to edit.</p>
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
