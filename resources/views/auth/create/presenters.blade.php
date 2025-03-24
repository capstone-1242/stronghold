<x-admin-layout>
    <h2>Create a Presenter</h2>

    @if(session('success'))
        <div class="alert alert-success bg-green-500 text-white p-4 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('presenters.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="first_name" class="block">First Name</label>
            <input type="text" name="first_name" id="first_name" class="border p-2 w-full" required value="{{ old('first_name') }}">
            <small class="text-gray-600">Please enter the first name of the presenter.</small>
        </div>
        
        <div class="mb-4">
            <label for="last_name" class="block">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="border p-2 w-full" required value="{{ old('last_name') }}">
            <small class="text-gray-600">Please enter the last name of the presenter.</small>
        </div>
        
        <div class="mb-4">
            <label for="description" class="block">Description</label>
            <textarea name="description" id="description" class="border p-2 w-full" required>{{ old('description') }}</textarea>
            <small class="text-gray-600">Provide a brief description of the presenter. This allows the user to connect with them more.</small>
        </div>
        
        <div class="mb-6">
            <input type="submit" value="Create Presenter" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
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
</x-admin-layout>
