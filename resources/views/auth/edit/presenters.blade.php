<x-admin-layout>
    <h2>Edit a Presenter</h2>
    
    @if(session('success'))
        <div class="alert alert-success bg-green-500 text-white p-4 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('auth.edit.presenters') }}" class="mb-4">
        <label for="select-author" class="block">Select Presenter</label>
        <select id="select-author" name="author_id" class="w-full" onchange="this.form.submit()">
            <option value="">Select a Presenter</option>
            @foreach ($authors as $authorOption)
                <option value="{{ $authorOption->id }}" {{ $author && $author->id == $authorOption->id ? 'selected' : '' }}>
                    {{ $authorOption->first_name }} {{ $authorOption->last_name }}
                </option>
            @endforeach
        </select>
        <small class="text-gray-600">Select the presenter you would like to edit from the available list.</small>
    </form>

    @if ($author)
        <form action="{{ route('presenters.update', $author->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="first_name" class="block">First Name</label>
                <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $author->first_name) }}" class="border p-2 w-full" required>
                <small class="text-gray-600">Please enter the first name of the presenter.</small>
            </div>

            <div class="mb-4">
                <label for="last_name" class="block">Last Name</label>
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $author->last_name) }}" class="border p-2 w-full" required>
                <small class="text-gray-600">Please enter the last name of the presenter.</small>
            </div>

            <div class="mb-4">
                <label for="description" class="block">Description</label>
                <textarea id="description" name="description" class="border p-2 w-full" required>{{ old('description', $author->description) }}</textarea>
                <small class="text-gray-600">Provide a brief description of the presenter. This allows the user to connect with them more.</small>
            </div>

            <div class="mb-6">
                <input type="submit" value="Update Presenter" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
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
