<x-admin-layout :title="'Edit a Presenter'">
   <section class="p-6 md:p-12">
        <h2 class="font-semibold text-4xl my-12">Edit a Presenter</h2>
        
        @if(session('success'))
            <div class="bg-green-700 text-white text-center rounded-xl p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif
    
        <form method="GET" action="{{ route('auth.edit.presenters') }}" class="mb-6">
            <label for="select-author" class="block w-full">Select Presenter</label>
            <select id="select-author" name="author_id" class="border border-gray-800 p-2 w-full rounded-xl bg-white" onchange="this.form.submit()">
                <option value="">Select a Presenter</option>
                @foreach ($authors as $authorOption)
                    <option value="{{ $authorOption->id }}" {{ $author && $author->id == $authorOption->id ? 'selected' : '' }}>
                        {{ $authorOption->first_name }} {{ $authorOption->last_name }}
                    </option>
                @endforeach
            </select>
            <small>Select the presenter you would like to edit from the available list.</small>
        </form>
    
        @if ($author)
            <form action="{{ route('presenters.update', $author->id) }}" method="POST">
                @csrf
                @method('PUT')
    
                <div class="mb-6">
                    <label for="first_name" class="block w-full">First Name</label>
                    <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $author->first_name) }}" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>
                    <small>Please enter the first name of the presenter.</small>
                </div>
    
                <div class="mb-6">
                    <label for="last_name" class="block w-full">Last Name</label>
                    <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $author->last_name) }}" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>
                    <small>Please enter the last name of the presenter.</small>
                </div>
    
                <div class="mb-6">
                    <label for="description" class="block w-full">Description</label>
                    <textarea id="description" name="description" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>{{ old('description', $author->description) }}</textarea>
                    <small>Provide a brief description of the presenter. This allows the user to connect with them more.</small>
                </div>
    
                <div class="mb-6">
                    <input type="submit" value="Update Presenter" class="bg-sky-900 text-white p-2 rounded-xl hover:bg-sky-600 w-full">
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
