<x-layout>
<div class="min-h-[60vh] mt-26">
    <section class="login">
          <div class="max-w-[500px] mx-auto">  
            <h2 class="font-semibold text-4xl my-12">Login</h2>
            
            @if(session('status'))
                <div class="bg-green-700 text-white text-center rounded-xl p-4 mb-6">
                    {{ session('status') }}
                </div>
            @endif
        
        
                <form method="POST" action="{{ route('login.store') }}">
                    @csrf
            
                    <div class="mb-6">
                        <label for="email" class="block w-full">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="border border-gray-800 p-2 w-full rounded-xl bg-white text-black" required autofocus autocomplete="username">
                        <small>Enter your email address.</small>
                    </div>
            
                    <div class="mb-6">
                        <label for="password" class="block w-full">Password</label>
                        <input type="password" id="password" name="password" class="border border-gray-800 p-2 w-full rounded-xl bg-white text-black" required autocomplete="current-password">
                        <small>Enter your password.</small>
                    </div>
            
                    <div class="flex items-center justify-between my-6">
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center gap-2">
                                <input id="remember_me" type="checkbox" class="rounded" name="remember">
                                <span>Remember me</span>
                            </label>
                        </div>
                
                        <div class="my-4">
                            @if (Route::has('password.request'))
                                <a class="underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    Forgot your password?
                                </a>
                            @endif
                        </div>
                    </div>
            
                    <input type="submit" value="Log in" class="bg-gray-900 text-white p-2 rounded-xl hover:bg-gray-800 cursor-pointer w-full mb-12">
                </form>
            
                @if ($errors->any())
                    <div class="bg-red-300 border border-2 border-red-700 p-4 text-black text-center my-6 rounded-xl">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        </div>
    </section>
</div>
</x-layout>