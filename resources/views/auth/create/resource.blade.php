<x-admin-layout :title="'Create a Resource'">
    <section class="p-6 md:p-12 container">
        <h2 class="font-semibold text-4xl my-12">Create a Resource</h2>
    
        @if(session('success'))
            <div class="bg-green-700 text-white text-center rounded-xl p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif
    
        <form action="{{ route('resource.store') }}" method="POST">
            @csrf
    
            <div class="mb-6">
                <label for="title" class="block w-full">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>
                <small>Please provide a title for the resource.</small>
            </div>
    
            <div class="mb-6">
                <label for="description" class="block w-full">Description</label>
                <textarea id="description" name="description" class="border border-gray-800 p-2 w-full rounded-xl bg-white">{{ old('description') }}</textarea>
                <small>Provide a short description of the resource.</small>
            </div>
    
            <div class="mb-6">
                <label for="url" class="block w-full">URL</label>
                <input type="url" id="url" name="url" value="{{ old('url') }}" class="border border-gray-800 p-2 w-full rounded-xl bg-white">
                <small>If the resource is available online, please provide the URL link.</small>
            </div>
    
            <div class="mb-6">
                <label for="number" class="block w-full">Phone Number</label>
                <input type="text" id="number" name="number" value="{{ old('number') }}" class="border border-gray-800 p-2 w-full rounded-xl bg-white">
                <small>If the resource is a phone number, please provide it in the format 123-456-7890.</small>
            </div>
    
            <div class="mb-6">
                <label for="tag_id" class="block w-full">Career Tag</label>
                <select id="tag_id" name="tag_id" class="border border-gray-800 p-2 w-full rounded-xl bg-white">
                    <option value="">Select a Tag</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ old('tag_id') == $tag->id ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                <small>Choose a tag that best categorizes the resource. This is optional.</small>
            </div>
    
            <div class="mb-6">
                <input type="submit" value="Add Resource" class="cursor-pointer bg-sky-900 text-white p-2 rounded-xl hover:bg-sky-600 w-full">
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
    </section>
</x-admin-layout>
