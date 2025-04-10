<x-admin-layout :title="'Create a Presenter'">
    <section class="p-6 md:p-12">
        <h2 class="font-semibold text-4xl my-12">Create a Presenter</h2>
    
        @if(session('success'))
            <div class="bg-green-700 text-white text-center rounded-xl p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif
    
        <form action="{{ route('presenters.store') }}" method="POST">
            @csrf
    
            <div class="mb-6">
                <label for="first_name" class="block w-full">First Name</label>
                <input type="text" name="first_name" id="first_name" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required value="{{ old('first_name') }}">
                <small>Please enter the first name of the presenter.</small>
            </div>
            
            <div class="mb-6">
                <label for="last_name" class="block w-full">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required value="{{ old('last_name') }}">
                <small>Please enter the last name of the presenter.</small>
            </div>
            
            <div class="mb-6">
                <label for="description" class="block w-full">Description</label>
                <textarea name="description" id="description" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>{{ old('description') }}</textarea>
                <small>Provide a brief description of the presenter. This allows the user to connect with them more.</small>
            </div>
            
            <div class="mb-6">
                <input type="submit" value="Create Presenter" class="bg-sky-900 text-white p-2 rounded-xl hover:bg-sky-600 w-full">
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
