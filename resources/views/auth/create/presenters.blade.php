<x-admin-layout>
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
        </div>
        
        <div class="mb-4">
            <label for="last_name" class="block">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="border p-2 w-full" required value="{{ old('last_name') }}">
        </div>
        
        <div class="mb-4">
            <label for="description" class="block">Description</label>
            <textarea name="description" id="description" class="border p-2 w-full" required>{{ old('description') }}</textarea>
        </div>
        
        <div class="mb-6">
            <input type="submit" value="Create Presenter" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
        </div>
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
