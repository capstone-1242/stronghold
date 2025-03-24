<x-admin-layout>
    <h2>Edit a Resource</h2>

    @if(session('success'))
        <div class="alert alert-success bg-green-500 text-white p-4 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('auth.edit.resource') }}" class="mb-4">
        <label for="select-resource" class="block">Select Resource:</label>
        <select id="select-resource" name="resource_id" onchange="this.form.submit()" class="border p-2 w-full">
            <option value="">Select a Resource</option>
            @foreach ($resources as $resourceOption)
                <option value="{{ $resourceOption->id }}" {{ $resource && $resource->id == $resourceOption->id ? 'selected' : '' }}>
                    {{ $resourceOption->title }}
                </option>
            @endforeach
        </select>
        <small class="text-gray-600">Select the resource you would like to edit from the available list.</small>
    </form>

    @if ($resource)
        <form action="{{ route('resource.update', $resource->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block">Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title', $resource->title) }}" class="border p-2 w-full" required>
                <small class="text-gray-600">Please provide a title for the resource.</small>
            </div>

            <div class="mb-4">
                <label for="description" class="block">Description:</label>
                <textarea id="description" name="description" class="border p-2 w-full" required>{{ old('description', $resource->description) }}</textarea>
                <small class="text-gray-600">Provide a description of the resource.</small>
            </div>

            <div class="mb-4">
                <label for="url" class="block">URL:</label>
                <input type="url" id="url" name="url" value="{{ old('url', $resource->url) }}" class="border p-2 w-full" required>
                <small class="text-gray-600">Please provide the URL for the resource.</small>
            </div>

            <div class="mb-4">
                <label for="number" class="block">Phone Number:</label>
                <input type="text" id="number" name="number" value="{{ old('number', $resource->number) }}" class="border p-2 w-full">
                <small class="text-gray-600">If applicable, provide a phone number for contacting the resource provider.</small>
            </div>

            <div class="mb-4">
                <label for="tag_id" class="block">Tag:</label>
                <select id="tag_id" name="tag_id" class="border p-2 w-full">
                    <option value="">Select a Tag</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ old('tag_id', $resource->tag_id) == $tag->id ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                <small class="text-gray-600">Choose a tag that best categorizes the resource. This is optional.</small>
            </div>

            <div class="mb-6">
                <input type="submit" value="Update Resource" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
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
