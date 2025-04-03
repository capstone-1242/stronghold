<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>STRONGHOLD Dashboard</title>

        @vite(['resources/css/app.css', 'resources/css/styles.css', 'resources/js/main.js'])
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:ital,wght@0,400;0,700;1,400;1,700&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>

    <body class="bg-gray-100 dashboard">
        <div class="sidebar-flex">
            <div class="bg-gray-800 text-white navbar-content-dash">
                <section>
                    <h1>STRONGHOLD</h1>

                    <button class="tog-btn" aria-label="Main Navigation Menu" aria-expanded="false" aria-controls="main-menu">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <title>Menu</title>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </section>

                <div class="dash-menu mb-6 bg-gray-800">
                    <nav class="mt-6">
                        <ul class="space-y-6">
                            <x-nav-link href="/dashboard" :active="request()->is('dashboard')" class="p-2 x-nav-link block rounded-xl">Dashboard</x-nav-link>

                            <li>
                                <button class="x-nav-link w-[100%] text-left dash-dropdown rounded-tl-xl rounded-tr-xl cursor-pointer flex justify-between items-center p-2" aria-expanded="false">
                                    Videos
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M11.47 13.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 0 0-1.06-1.06L12 11.69 5.03 4.72a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M11.47 19.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 1 0-1.06-1.06L12 17.69l-6.97-6.97a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div class="left-0 bg-gray-600 rounded-bl-xl rounded-br-xl p-2 hidden dash-drop-content">
                                    <ul class="space-y-3 py-2 link-group">
                                        <x-nav-link href="/auth/auth-videos" :active="request()->is('auth/auth-videos')">All Videos</x-nav-link>
                                        <x-nav-link href="/auth/create/video" :active="request()->is('auth/create/video')">Create Video</x-nav-link>
                                        <x-nav-link href="/auth/edit/video" :active="request()->is('auth/edit/video')">Edit Video</x-nav-link>
                                        <x-nav-link href="/auth/destroy/video" :active="request()->is('auth/destroy/video')">Delete Video</x-nav-link>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <button class="x-nav-link w-[100%] text-left dash-dropdown rounded-tl-xl rounded-tr-xl cursor-pointer flex justify-between items-center p-2" aria-expanded="false">
                                    Resources
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M11.47 13.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 0 0-1.06-1.06L12 11.69 5.03 4.72a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M11.47 19.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 1 0-1.06-1.06L12 17.69l-6.97-6.97a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div class="left-0 bg-gray-600 rounded-bl-xl rounded-br-xl p-2 hidden dash-drop-content">
                                    <ul class="space-y-3 py-2 link-group">
                                        <x-nav-link href="/auth/auth-resources" :active="request()->is('auth/auth-resources')">All Resources</x-nav-link>
                                        <x-nav-link href="/auth/create/resource" :active="request()->is('auth/create/resource')">Create Resource</x-nav-link>
                                        <x-nav-link href="/auth/edit/resource" :active="request()->is('auth/edit/resource')">Edit Resource</x-nav-link>
                                        <x-nav-link href="/auth/destroy/resource" :active="request()->is('auth/destroy/resource')">Delete Resource</x-nav-link>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <button class="x-nav-link w-[100%] text-left dash-dropdown rounded-tl-xl rounded-tr-xl cursor-pointer flex justify-between items-center p-2" aria-expanded="false">
                                    Presenters
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M11.47 13.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 0 0-1.06-1.06L12 11.69 5.03 4.72a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M11.47 19.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 1 0-1.06-1.06L12 17.69l-6.97-6.97a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div class="left-0 bg-gray-600 rounded-bl-xl rounded-br-xl p-2 hidden dash-drop-content">
                                    <ul class="space-y-3 py-2 link-group">
                                        <x-nav-link href="/auth/auth-presenters" :active="request()->is('auth/auth-presenters')">All Presenters</x-nav-link>
                                        <x-nav-link href="/auth/create/presenters" :active="request()->is('auth/create/presenters')">Create Presenter</x-nav-link>
                                        <x-nav-link href="/auth/edit/presenters" :active="request()->is('auth/edit/presenters')">Edit Presenter</x-nav-link>
                                        <x-nav-link href="/auth/destroy/presenters" :active="request()->is('auth/destroy/presenters')">Delete Presenter</x-nav-link>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <button class="x-nav-link w-[100%] text-left dash-dropdown rounded-tl-xl rounded-tr-xl cursor-pointer flex justify-between items-center p-2" aria-expanded="false">
                                    Memorials
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M11.47 13.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 0 0-1.06-1.06L12 11.69 5.03 4.72a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M11.47 19.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 1 0-1.06-1.06L12 17.69l-6.97-6.97a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div class="left-0 bg-gray-600 rounded-bl-xl rounded-br-xl p-2 hidden dash-drop-content">
                                    <ul class="space-y-3 py-2 link-group">
                                        <x-nav-link href="/auth/auth-memorials" :active="request()->is('auth/auth-memorials')">All Memorials</x-nav-link>
                                        <x-nav-link href="/auth/create/memorial" :active="request()->is('auth/create/memorial')">Create Memorial</x-nav-link>
                                        <x-nav-link href="/auth/edit/memorial" :active="request()->is('auth/edit/memorial')">Edit Memorial</x-nav-link>
                                        <x-nav-link href="/auth/destroy/memorial" :active="request()->is('auth/destroy/memorial')">Delete Memorial</x-nav-link>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <button class="x-nav-link w-[100%] text-left dash-dropdown rounded-tl-xl rounded-tr-xl cursor-pointer flex justify-between items-center p-2" aria-expanded="false">
                                    Memorial Images
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M11.47 13.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 0 0-1.06-1.06L12 11.69 5.03 4.72a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M11.47 19.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 1 0-1.06-1.06L12 17.69l-6.97-6.97a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div class="left-0 bg-gray-600 rounded-bl-xl rounded-br-xl p-2 hidden dash-drop-content">
                                    <ul class="space-y-3 py-2 link-group">
                                        <x-nav-link href="/auth/auth-memorial-images" :active="request()->is('auth/auth-memorial-images')">All Memorial Images</x-nav-link>
                                        <x-nav-link href="/auth/create/memorial-images" :active="request()->is('auth/create/memorial-images')">Add Memorial Images</x-nav-link>
                                        <x-nav-link href="/auth/edit/memorial-images" :active="request()->is('auth/edit/memorial-images')">Edit Memorial Images</x-nav-link>
                                        <x-nav-link href="/auth/destroy/memorial-images" :active="request()->is('auth/destroy/memorial-images')">Delete Memorial Images</x-nav-link>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <button class="x-nav-link w-[100%] text-left dash-dropdown rounded-tl-xl rounded-tr-xl cursor-pointer flex justify-between items-center p-2" aria-expanded="false">
                                    Users
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M11.47 13.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 0 0-1.06-1.06L12 11.69 5.03 4.72a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M11.47 19.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 1 0-1.06-1.06L12 17.69l-6.97-6.97a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div class="left-0 bg-gray-600 rounded-bl-xl rounded-br-xl p-2 hidden dash-drop-content">
                                    <ul class="space-y-3 py-2 link-group">
                                        <x-nav-link href="/auth/auth-users" :active="request()->is('auth/auth-users')">All Users</x-nav-link>
                                        <x-nav-link href="/auth/create/user" :active="request()->is('auth/create/user')">Create User</x-nav-link>
                                        <x-nav-link href="/auth/edit/user" :active="request()->is('auth/edit/user')">Edit User</x-nav-link>
                                        <x-nav-link href="/auth/destroy/user" :active="request()->is('auth/destroy/user')">Delete User</x-nav-link>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <button class="x-nav-link w-[100%] text-left dash-dropdown rounded-tl-xl rounded-tr-xl cursor-pointer flex justify-between items-center p-2" aria-expanded="false">
                                    Testimonials
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M11.47 13.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 0 0-1.06-1.06L12 11.69 5.03 4.72a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M11.47 19.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 1 0-1.06-1.06L12 17.69l-6.97-6.97a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div class="left-0 bg-gray-600 rounded-bl-xl rounded-br-xl p-2 hidden dash-drop-content">
                                    <ul class="space-y-3 py-2 link-group">
                                        <x-nav-link href="/auth/auth-testimonials" :active="request()->is('auth/auth-testimonials')">All Testimonials</x-nav-link>
                                        <x-nav-link href="/auth/create/testimonial" :active="request()->is('auth/create/testimonial')">Create Testimonial</x-nav-link>
                                        <x-nav-link href="/auth/edit/testimonial" :active="request()->is('auth/edit/testimonial')">Edit Testimonial</x-nav-link>
                                        <x-nav-link href="/auth/destroy/testimonial" :active="request()->is('auth/destroy/testimonial')">Delete Testimonial</x-nav-link>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <button class="x-nav-link w-[100%] text-left dash-dropdown rounded-tl-xl rounded-tr-xl cursor-pointer flex justify-between items-center p-2" aria-expanded="false">
                                    Links
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M11.47 13.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 0 0-1.06-1.06L12 11.69 5.03 4.72a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M11.47 19.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 1 0-1.06-1.06L12 17.69l-6.97-6.97a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div class="left-0 bg-gray-600 rounded-bl-xl rounded-br-xl p-2 hidden dash-drop-content">
                                    <ul class="space-y-3 py-2 link-group">
                                        <x-nav-link href="/auth/auth-links" :active="request()->is('auth/auth-links')">All Links</x-nav-link>
                                        <x-nav-link href="/auth/create/links" :active="request()->is('auth/create/links')">Create Link</x-nav-link>
                                        <x-nav-link href="/auth/edit/links" :active="request()->is('auth/edit/links')">Edit Link</x-nav-link>
                                        <x-nav-link href="/auth/destroy/links" :active="request()->is('auth/destroy/links')">Delete Link</x-nav-link>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="bg-red-700 w-full p-2 rounded-lg my-6 hover:bg-red-600 cursor-pointer">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <main class="bg-gray-100 w-[100%]">
                {{ $slot }}
            </main>
        </div>

        <footer class="bg-black text-white text-center px-4 py-8">
            <section class="pb-6">
                <h4 class="font-bold text-2xl pb-2">STRONGHOLD</h4>
            </section>

            <nav>
                <ul class="flex items-center justify-center gap-8 mx-auto max-w-xl text-left">
                    <x-nav-link href="/" :active="request()->is('/')" target="_blank">Visit Site</x-nav-link>
                    <x-nav-link href="/auth/login" :active="request()->is('/auth/login')">Admin Login</x-nav-link>
                </ul>
            </nav>
        </footer>
    </body>
</html>

<script>
    let btn = document.querySelector('.tog-btn');
    let menu = document.querySelector('.dash-menu');

    btn.addEventListener('click', function () {
        menu.classList.toggle('show-nav');

        let expanded = this.getAttribute('aria-expanded') === 'true';
        this.setAttribute('aria-expanded', !expanded);
    });

    let dropdownButtons = document.querySelectorAll('.dash-dropdown');
    dropdownButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            let dropdownContent = this.nextElementSibling;
            dropdownContent.classList.toggle('show');

            let expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);

            this.classList.toggle('bg-gray-600');
        });
    });
</script>
