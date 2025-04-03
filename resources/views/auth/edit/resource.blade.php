<x-admin-layout>
    <section class="p-6 md:p-12">
        <h2 class="font-semibold text-4xl my-12">Edit a Resource</h2>
    
        @if(session('success'))
            <div class="bg-green-700 text-white text-center rounded-xl p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif
    
        <form method="GET" action="{{ route('auth.edit.resource') }}" class="mb-6">
            <label for="select-resource" class="block w-full">Select Resource</label>
            <select id="select-resource" name="resource_id" onchange="this.form.submit()" class="border border-gray-800 p-2 w-full rounded-xl bg-white">
                <option value="">Select a Resource</option>
                @foreach ($resources as $resourceOption)
                    <option value="{{ $resourceOption->id }}" {{ $resource && $resource->id == $resourceOption->id ? 'selected' : '' }}>
                        {{ $resourceOption->title }}
                    </option>
                @endforeach
            </select>
            <small>Select the resource you would like to edit from the available list.</small>
        </form>
    
        @if ($resource)
            <form action="{{ route('resource.update', $resource->id) }}" method="POST">
                @csrf
                @method('PUT')
    
                <div class="mb-6">
                    <label for="title" class="block w-full">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $resource->title) }}" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>
                    <small>Please provide a title for the resource.</small>
                </div>
    
                <div class="mb-6">
                    <label for="description" class="block w-full">Description</label>
                    <textarea id="description" name="description" class="border border-gray-800 p-2 w-full rounded-xl bg-white">{{ old('description', $resource->description) }}</textarea>
                    <small>Provide a description of the resource.</small>
                </div>
    
                <div class="mb-6">
                    <label for="url" class="block w-full">URL</label>
                    <input type="url" id="url" name="url" value="{{ old('url', $resource->url) }}" class="border border-gray-800 p-2 w-full rounded-xl bg-white">
                    <small>Please provide the URL for the resource.</small>
                </div>
    
                <div class="mb-6">
                    <label for="number" class="block w-full">Phone Number</label>
                    <input type="text" id="number" name="number" value="{{ old('number', $resource->number) }}" class="border border-gray-800 p-2 w-full rounded-xl bg-white">
                    <small>If applicable, provide a phone number for contacting the resource provider.</small>
                </div>
    
                <div class="mb-6">
                    <label for="tag_id" class="block w-full">Tag</label>
                    <select id="tag_id" name="tag_id" class="border border-gray-800 p-2 w-full rounded-xl bg-white">
                        <option value="">Select a Tag</option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" {{ old('tag_id', $resource->tag_id) == $tag->id ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    <small>Choose a tag that best categorizes the resource. This is optional.</small>
                </div>
    
                <div class="mb-6">
                    <input type="submit" value="Update Resource" class="bg-sky-900 text-white p-2 rounded-xl hover:bg-sky-600 w-full">
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
    </section>
</x-admin-layout>
