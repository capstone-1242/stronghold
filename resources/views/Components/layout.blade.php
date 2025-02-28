<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>STRONGHOLD</title>

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="h-full">
        <div class="min-h-full">
            <header class="bg-gray-800">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between">
                        <h1 class="font-bold text-xl text-white"><a href="/">STRONGHOLD</a></h1>
                        <div class="hidden md:block">
                            <ul class="ml-10 flex items-baseline space-x-4">
                                <x-nav-link href="/videos" :active="request()->is('videos')">All Videos</x-nav-link>
                                <x-nav-link href="/resources" :active="request()->is('resources')">Resources</x-nav-link>
                                <x-nav-link href="/testimonials" :active="request()->is('testimonials')">Testimonials</x-nav-link>
                                <x-nav-link href="/memorials" :active="request()->is('memorials')">Memorials</x-nav-link>
                                <x-nav-link href="/about#contact" :active="request()->is('about')">Contact Us</x-nav-link>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            <main class="mx-auto max-w-6xl px-4 py-6">
                <div>
                    <section class="mx-auto max-w-7xl p-4">
                        <h1 class="text-3xl text-gray-900">{{ $heading }}</h1>
                    </section>
                </div>
                
                {{ $slot }}
            </main>

            <footer class="bg-black text-white text-center px-4 py-8">
                <section class="pb-6">
                    <h4 class="font-bold text-2xl pb-2"><a>STRONGHOLD</a></h4>
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
                        <x-nav-link href="/login" :active="request()->is('login')">Admin Login</x-nav-link>
                    </ul>
                </nav>

                <x-disclaimer/>
            </footer>
        </div>
    </body>
</html>