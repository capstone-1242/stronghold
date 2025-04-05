<x-admin-layout>
   <section class="p-6 md:p-12">
        <h2 class="font-semibold text-4xl my-12">Create a Link for a Presenter</h2>
    
        <p class="my-8"><strong>Note:</strong> If the link you're entering is for a YouTube video, please visit the <a href="/auth/create/video" class="underline">Create Video</a> page to add it to the video database. These links are for external resources and will be shown below the video for that presenter.</p>
    
        @if(session('success'))
            <div class="bg-green-700 text-white text-center rounded-xl p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif
    
        <form action="{{ route('links.store') }}" method="POST">
            @csrf
    
            <div class="mb-4">
                <label for="author_id" class="block w-full">Presenter</label>
                <select name="author_id" id="author_id" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>
                    <option value="">Select a Presenter</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                            {{ $author->first_name }} {{ $author->last_name }}
                        </option>
                    @endforeach
                </select>
                <small>Please select the presenter this link is associated with.</small>
            </div>
    
            <div class="mb-4">
                <label for="url" class="block w-full">URL</label>
                <input type="url" name="url" id="url" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required value="{{ old('url') }}">
                <small>Please enter a valid URL.</small>
            </div>
            
            <div class="mb-4">
                <label for="title" class="block w-full">Title</label>
                <input type="text" name="title" id="title" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required value="{{ old('title') }}">
                <small>Please enter the title for this link.</small>
            </div>
    
            <div class="mb-6">
                <input type="submit" value="Create Link" class="bg-sky-900 text-white p-2 rounded-xl hover:bg-sky-600 w-full">
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
