<x-layout>
    <h2 class="font-semibold text-4xl my-12">Forgot Password</h2>
    
    <div class="mb-6">
        {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    @if(session('status'))
        <div class="bg-green-700 text-white text-center rounded-xl p-4 mb-6">
            {{ session('status') }}
        </div>
    @endif

    <div class="h-[55vh]">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-6">
                <label for="email" class="block w-full">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="border border-gray-800 p-2 w-full rounded-xl bg-white text-black" required autofocus>
                <small>Enter your email address.</small>
            </div>

            <div class="flex items-center justify-end mt-4">
                <input type="submit" value="Email Password Reset Link" class="bg-gray-900 text-white p-2 rounded-xl hover:bg-gray-800 cursor-pointer w-full">
            </div>
        </form>

        @if ($errors->any())
            <div class="bg-red-300 border border-2 border-red-700 p-4 text-black my-6 rounded-xl">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</x-layout>
