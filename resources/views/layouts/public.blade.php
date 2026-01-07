<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Rayzarchitecture')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-neutral-900 antialiased">
    <div class="min-h-screen flex">
        {{-- Sidebar --}}
        <aside class="w-14 sm:w-16 bg-neutral-900 text-white flex flex-col items-center py-4 gap-4">
            <a href="{{ route('home') }}" class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center hover:bg-white/15 transition"
               title="Home" aria-label="Home">
                {{-- home icon --}}
                <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 10.5 12 3l9 7.5V21a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1z"/>
                </svg>
            </a>

            <div class="h-px w-8 bg-white/15 my-1"></div>

            <a href="{{ route('about') }}" class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center hover:bg-white/15 transition"
               title="About" aria-label="About">
                {{-- user icon --}}
                <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21a8 8 0 0 0-16 0"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
            </a>

            <a href="{{ route('projects.index') }}" class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center hover:bg-white/15 transition"
               title="Projects" aria-label="Projects">
                {{-- grid icon --}}
                <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 4h7v7H4zM13 4h7v7h-7zM4 13h7v7H4zM13 13h7v7h-7z"/>
                </svg>
            </a>

            <a href="{{ route('notes.index') }}" class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center hover:bg-white/15 transition"
               title="Media" aria-label="Media">
                {{-- image icon --}}
                <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    <path d="m3 16 5-5 4 4 3-3 6 6"/>
                    <circle cx="8.5" cy="8.5" r="1.5"/>
                </svg>
            </a>

            <a href="{{ route('feedback.create') }}" class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center hover:bg-white/15 transition"
               title="Message" aria-label="Message">
                {{-- message icon --}}
                <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"/>
                </svg>
            </a>

            <a href="{{ route('contact') }}" class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center hover:bg-white/15 transition mt-auto"
               title="Contact" aria-label="Contact">
                {{-- mail icon --}}
                <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 4h16v16H4z"/>
                    <path d="m4 6 8 7 8-7"/>
                </svg>
            </a>
        </aside>

        {{-- Main --}}
        <main class="flex-1">
            {{-- Top bar (kategori) --}}
            <header class="sticky top-0 z-10 bg-white/80 backdrop-blur border-b border-neutral-200">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 py-3 flex items-center justify-between">
                    <a href="{{ route('home') }}" class="font-semibold tracking-wide">
                        RAYZ<span class="text-neutral-500">ARCHITECTURE</span>
                    </a>

                    <nav class="flex items-center gap-4 text-sm tracking-wide">
                        <a class="hover:text-neutral-500 {{ request()->routeIs('architecture') ? 'text-neutral-500' : '' }}"
                           href="{{ route('architecture') }}">ARCHITECTURE</a>
                        <a class="hover:text-neutral-500 {{ request()->routeIs('interior') ? 'text-neutral-500' : '' }}"
                           href="{{ route('interior') }}">INTERIOR</a>
                        <a class="hover:text-neutral-500 {{ request()->routeIs('design') ? 'text-neutral-500' : '' }}"
                           href="{{ route('design') }}">DESIGN</a>
                    </nav>
                </div>
            </header>

            <div class="max-w-6xl mx-auto px-4 sm:px-6 py-8">
                @if(session('success'))
                    <div class="mb-6 rounded-2xl border border-neutral-200 bg-neutral-50 px-4 py-3 text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')

                <footer class="mt-14 pt-8 border-t border-neutral-200 text-xs text-neutral-500 flex flex-col sm:flex-row gap-2 sm:items-center sm:justify-between">
                    <p>© {{ date('Y') }} Rayzarchitecture</p>
                    <p class="tracking-wide">YOUR VISION, OUR PRECISION</p>
                </footer>
            </div>
        </main>
    </div>
</body>
</html>
