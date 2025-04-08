<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>STRONGHOLD</title>

        @vite(['resources/css/styles.css', 'resources/js/main.js'])
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:ital,wght@0,400;0,700;1,400;1,700&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="min-h-full">
            <header>
                <div class="container">
                    <div class="navbar-content pt-6">
                        <section>
                            <h1><a href="/" class="text-[24px]!">STRONGHOLD</a></h1>

                            <button class="tog-btn cursor-pointer" aria-label="Main Navigation Menu" aria-expanded="false" aria-controls="main-menu">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <title>Menu</title>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                            </button>
                        </section>

                        <nav class="main-menu" id="main-menu">
                            <ul>
                                <x-nav-link href="/videos" :active="request()->is('videos')">Insightful Videos</x-nav-link>
                                <x-nav-link href="/testimonials" :active="request()->is('testimonials')">Testimonials</x-nav-link>
                                <x-nav-link href="/memorials" :active="request()->is('memorials')">Memorials</x-nav-link>
                                <x-nav-link href="/about" :active="request()->is('about')">About/Contact Us</x-nav-link>
                                <x-nav-link href="/resources" :active="request()->is('resources')">Resources</x-nav-link>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>

            {{ $slot }}

            <footer>

                <div class="lg:flex lg:gap-10 items-center lg:items-start lg:max-w-[70%] mx-auto lg:flex-wrap">
                    <div class=" md:max-w-full mx-auto lg:flex-1">
                        <section class="text-center lg:text-left">
                            <h4 class="font-bold">
                                <a href="/">STRONGHOLD</a>
                            </h4>

                            <p>"Where hope is an anchor"</p>
                        </section>
                        <nav class="">
                            <ul>
                                <div class="grid grid-cols-3 mx-auto md:flex md:gap-8 lg:mx-0 ">
                                    <x-nav-link href="/sitemap" :active="request()->is('sitemap')">Sitemap</x-nav-link>
                                    <x-nav-link href="/videos" :active="request()->is('videos')">Videos</x-nav-link>
                                    <x-nav-link href="/testimonials" :active="request()->is('testimonials')">Testimonials</x-nav-link>
                                    <x-nav-link href="/privacy" :active="request()->is('privacy')">Privacy</x-nav-link>
                                    <x-nav-link href="/resources" :active="request()->is('resources')">Resources</x-nav-link>
                                    <x-nav-link href="/memorials" :active="request()->is('memorials')">Memorials</x-nav-link>
                                </div>
                            </ul>
                        </nav>

                        <div class="divider"></div>

                        <nav>
                            <ul class="flex gap-6 justify-center lg:justify-start">
                                <x-nav-link href="/about" :active="request()->is('about')">About Us</x-nav-link>
                                <x-nav-link href="/auth/login" :active="request()->is('/auth/login')">Admin Login</x-nav-link>
                            </ul>
                        </nav>
                    </div>

                    <div class="max-w-[420px]"><x-disclaimer /></div>
                </div>
            </footer>
        </div>
    </body>
</html>
