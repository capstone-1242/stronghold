<x-admin-layout :title="'Edit a Link'">
   <section class="p-6 md:p-12 container">
        <h2 class="font-semibold text-4xl my-12">Edit a Link</h2>
    
        @if(session('success'))
            <div class="bg-green-700 text-white text-center rounded-xl p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif
    
        <form method="GET" action="{{ route('auth.edit.links') }}" class="mb-6">
            <label for="select-link" class="block w-full">Select Link</label>
            <select id="select-link" class="border border-gray-800 p-2 w-full rounded-xl bg-white" name="link_id" onchange="this.form.submit()">
                <option value="">Select a Link</option>
                @foreach ($links as $linkOption)
                    <option value="{{ $linkOption->id }}" {{ $link && $link->id == $linkOption->id ? 'selected' : '' }}>
                        {{ $linkOption->title }}
                    </option>
                @endforeach
            </select>
            <small>Select the link you would like to edit from the available list.</small>
        </form>
    
        @if ($link)
            <form action="{{ route('links.update', $link->id) }}" method="POST">
                @csrf
                @method('PUT')
    
                <div class="mb-6">
                    <label for="title" class="block w-full">Title</label>
                    <input type="text" id="title" name="title" class="border border-gray-800 p-2 w-full rounded-xl bg-white" value="{{ old('title', $link->title) }}" required>
                    <small>Please enter the title of the link.</small>
                </div>
    
                <div class="mb-6">
                    <label for="url" class="block w-full">URL</label>
                    <input type="url" id="url" name="url" class="border border-gray-800 p-2 w-full rounded-xl bg-white" value="{{ old('url', $link->url) }}" required>
                    <small>Please enter a valid URL.</small>
                </div>
    
                <div class="mb-6">
                    <label for="author_id" class="block w-full">Presenter</label>
                    <select id="author_id" name="author_id" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>
                        <option value="">Select an Author</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" {{ old('author_id', $link->author_id) == $author->id ? 'selected' : '' }}>
                                {{ $author->first_name }} {{ $author->last_name }}
                            </option>
                        @endforeach
                    </select>
                    <small>Please select the presenter this link is associated with.</small>
                </div>
    
                <div>
                    <input type="submit" value="Update Link" class="cursor-pointer bg-sky-900 text-white p-2 rounded-xl hover:bg-sky-600 w-full">
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
