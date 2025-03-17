<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>STRONGHOLD Dashboard</title>

        <script src="https://cdn.tailwindcss.com"></script> <!-- **** REMOVE BEFORE PUSHING TO PRODUCTION **** -->
        @vite(['resources/css/styles.css', 'resources/js/main.js'])
    </head>

    <body class="bg-gray-100">
        <div class="flex">
            <div class="w-72 bg-gray-800 text-white h-screen px-4">
                <h1 class="text-2xl font-bold"><a href="/">STRONGHOLD</a></h1>

                <nav class="mt-6">
                    <ul class="space-y-4">
                            <x-nav-link href="/dashboard" :active="request()->is('dashboard')">Dashboard</x-nav-link>
                        
                        <li>
                            <button class="w-full text-left dash-dropdown" aria-expanded="false">
                                Videos
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="left-0 mt-2 rounded-lg shadow-lg hidden dash-drop-content">
                                <ul class="space-y-2 py-2">
                                    <x-nav-link href="/auth/auth-videos" :active="request()->is('auth/auth-videos')">All Videos</x-nav-link>
                                    <x-nav-link href="#">Create Video</x-nav-link>
                                    <x-nav-link href="#">Edit Video</x-nav-link>
                                    <x-nav-link href="#">Delete Video</x-nav-link>
                                </ul>
                            </div>
                        </li>
                        
                        <li>
                            <button class="x-nav-link w-full text-left dash-dropdown" aria-expanded="false">
                                Resources
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="left-0 mt-2 rounded-lg shadow-lg hidden dash-drop-content">
                                <ul class="space-y-2 py-2">
                                    <x-nav-link href="/auth/auth-resources" :active="request()->is('auth/auth-resources')">All Resources</x-nav-link>
                                    <x-nav-link href="#">Create Resource</x-nav-link>
                                    <x-nav-link href="#">Edit Resource</x-nav-link>
                                    <x-nav-link href="#">Delete Resource</x-nav-link>
                                </ul>
                            </div>
                        </li>
                        
                        <li>
                            <button class="x-nav-link w-full text-left dash-dropdown" aria-expanded="false">
                                Presenters
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="left-0 mt-2 rounded-lg shadow-lg hidden dash-drop-content">
                                <ul class="space-y-2 py-2">
                                    <x-nav-link href="/auth/auth-presenters" :active="request()->is('auth/auth-presenters')">All Presenters</x-nav-link>
                                    <x-nav-link href="#">Create Presenter</x-nav-link>
                                    <x-nav-link href="#">Edit Presenter</x-nav-link>
                                    <x-nav-link href="#">Delete Presenter</x-nav-link>
                                </ul>
                            </div>
                        </li>
                        
                        <li>
                            <button class="x-nav-link w-full text-left dash-dropdown" aria-expanded="false">
                                Memorials
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="left-0 mt-2 w-48 rounded-lg shadow-lg hidden dash-drop-content">
                                <ul class="space-y-2 py-2">
                                    <x-nav-link href="/auth/auth-memorials" :active="request()->is('auth/auth-memorials')">All Memorials</x-nav-link>
                                    <x-nav-link href="#">Create Memorial</x-nav-link>
                                    <x-nav-link href="#">Edit Memorial</x-nav-link>
                                    <x-nav-link href="#">Delete Memorial</x-nav-link>
                                </ul>
                            </div>
                        </li>
                        
                        <li>
                            <button class="x-nav-link w-full text-left dash-dropdown" aria-expanded="false">
                                Users
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="left-0 mt-2 rounded-lg shadow-lg hidden dash-drop-content">
                                <ul class="space-y-2 py-2">
                                    <x-nav-link href="/auth/auth-users" :active="request()->is('auth/authuseros')">All Users</x-nav-link>
                                    <x-nav-link href="#">Create User</x-nav-link>
                                    <x-nav-link href="#">Edit User</x-nav-link>
                                    <x-nav-link href="#">Delete User</x-nav-link>
                                </ul>
                            </div>
                        </li>
                        
                        <li>
                            <button class="dash-dropdown" aria-expanded="false">
                                Testimonials
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="left-0 mt-2 rounded-lg shadow-lg hidden dash-drop-content">
                                <ul class="space-y-2 py-2">
                                    <x-nav-link href="/auth/auth-testimonials" :active="request()->is('auth/auth-testimonials')">All Testimonials</x-nav-link>
                                    <x-nav-link href="#">Create Testimonial</x-nav-link>
                                    <x-nav-link href="#">Edit Testimonial</x-nav-link>
                                    <x-nav-link href="#">Delete Testimonial</x-nav-link>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>

            <main class="flex-1 bg-gray-100 p-6">
                {{ $slot }}
            </main>
        </div>

        <footer class="bg-black text-white text-center px-4 py-8">
            <section class="pb-6">
                <h4 class="font-bold text-2xl pb-2">
                    <a href="/">STRONGHOLD</a>
                </h4>
            </section>

            <nav>
                <ul class="flex items-center justify-center gap-8 mx-auto max-w-xl text-left">
                    <x-nav-link href="/about" :active="request()->is('about')">About Us</x-nav-link>
                    <x-nav-link href="/about#contact" :active="request()->is('about#contact')">Contact Us</x-nav-link>
                    <x-nav-link href="/auth/login" :active="request()->is('/auth/login')">Admin Login</x-nav-link>
                </ul>
            </nav>

        </footer>
    </body>
</html>

<script>
    let dropdownButtons = document.querySelectorAll('.dash-dropdown');
    dropdownButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            let dropdownContent = this.nextElementSibling;
            dropdownContent.classList.toggle('show');
            let expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);
        });
    });
</script>