<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>STRONGHOLD</title>

        <script src="https://cdn.tailwindcss.com"></script> <!-- **** REMOVE BEFORE PUSHING TO PRODUCTION **** -->
        @vite(['resources/css/styles.css', 'resources/js/main.js'])
    </head>

    <body>
        <div class="min-h-full">
            <header>
                <div class="container">
                    <div class="navbar-content">
                        <section>
                            <h1><a href="/">STRONGHOLD</a></h1>
    
                            <button class="tog-btn" aria-label="Main Navigation Menu" aria-expanded="false" aria-controls="main-menu">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <title>Menu</title>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>                                  
                            </button>
                        </section>

                        <nav class="main-menu" id="main-menu">
                            <ul>
                                <x-nav-link href="/videos" :active="request()->is('videos')">All Videos</x-nav-link>
                                <x-nav-link href="/resources" :active="request()->is('resources')">Resources</x-nav-link>
                                <x-nav-link href="/testimonials" :active="request()->is('testimonials')">Testimonials</x-nav-link>
                                <x-nav-link href="/memorials" :active="request()->is('memorials')">Memorials</x-nav-link>
                                <x-nav-link href="/about#contact" :active="request()->is('about')">Contact Us</x-nav-link>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>            

            <main class="mx-auto max-w-6xl px-4 py-6">
                {{ $slot }}
            </main>

            <footer class="bg-black text-white text-center px-4 py-8">
                <section class="pb-6">
                    <h4 class="font-bold text-2xl pb-2">
                        <a href="/">STRONGHOLD</a>
                    </h4>

                    <p class="text-sm italic">"Where hope is an anchor"</p>
                </section>

                <nav>
                    <ul class="flex justify-center items-center gap-4 md:gap-8 lg:gap-16 mx-auto max-w-xl text-left">
                        <div>
                            <x-nav-link href="/sitemap" :active="request()->is('sitemap')">Sitemap</x-nav-link>
                            <x-nav-link href="/privacy" :active="request()->is('privacy')">Privacy</x-nav-link>
                        </div>
                        <div>
                            <x-nav-link href="/videos" :active="request()->is('videos')">All Videos</x-nav-link>
                            <x-nav-link href="/resources" :active="request()->is('resources')">Resources</x-nav-link>
                        </div>
                        <div>
                            <x-nav-link href="/testimonials" :active="request()->is('testimonials')">Testimonials</x-nav-link>
                            <x-nav-link href="/memorials" :active="request()->is('memorials')">Memorials</x-nav-link>
                        </div>
                    </ul>
                </nav>

                <hr class="w-3/12 mx-auto my-4">

                <nav>
                    <ul class="flex items-center justify-center gap-8 mx-auto max-w-xl text-left">
                        <x-nav-link href="/about" :active="request()->is('about')">About Us</x-nav-link>
                        <x-nav-link href="/about#contact" :active="request()->is('about#contact')">Contact Us</x-nav-link>
                        <x-nav-link href="/auth/login" :active="request()->is('/auth/login')">Admin Login</x-nav-link>
                    </ul>
                </nav>

                <x-disclaimer />
            </footer>
        </div>
    </body>
</html>
