<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Rayzarchitecture')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-neutral-900 antialiased">
    
    {{-- Mobile Sidebar Overlay --}}
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden transition-opacity duration-300"></div>
    
    {{-- Sidebar (Hidden by default, slide in from left) --}}
    <aside id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-black text-white z-50 transform -translate-x-full transition-transform duration-300 ease-in-out">
        <div class="flex flex-col h-full">
            {{-- Close Button --}}
            <div class="flex justify-between items-center p-6 border-b border-gray-800">
                <h2 class="text-xl font-light tracking-tight">Menu</h2>
                <button id="closeSidebar" class="w-8 h-8 flex items-center justify-center hover:bg-white/10 rounded transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            {{-- Navigation Links --}}
            <nav class="flex-1 px-6 py-8 space-y-2">
                <a href="{{ route('home') }}" 
                   class="flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors duration-300 group">
                    <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 10.5 12 3l9 7.5V21a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1z"/>
                    </svg>
                    <span class="font-light tracking-wide">Home</span>
                </a>

                <a href="{{ route('about') }}" 
                   class="flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors duration-300 group">
                    <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21a8 8 0 0 0-16 0"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    <span class="font-light tracking-wide">About</span>
                </a>

                <a href="{{ route('projects.index') }}" 
                   class="flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors duration-300 group">
                    <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h7v7H4zM13 4h7v7h-7zM4 13h7v7H4zM13 13h7v7h-7z"/>
                    </svg>
                    <span class="font-light tracking-wide">Projects</span>
                </a>

                <a href="{{ route('notes.index') }}" 
                   class="flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors duration-300 group">
                    <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                        <path d="m3 16 5-5 4 4 3-3 6 6"/>
                        <circle cx="8.5" cy="8.5" r="1.5"/>
                    </svg>
                    <span class="font-light tracking-wide">Media</span>
                </a>

                <a href="{{ route('feedback.create') }}" 
                   class="flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors duration-300 group">
                    <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"/>
                    </svg>
                    <span class="font-light tracking-wide">Message</span>
                </a>

                <div class="h-px bg-white/20 my-4"></div>

                <a href="{{ route('contact') }}" 
                   class="flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors duration-300 group">
                    <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h16v16H4z"/>
                        <path d="m4 6 8 7 8-7"/>
                    </svg>
                    <span class="font-light tracking-wide">Contact</span>
                </a>
            </nav>

            {{-- Footer Info --}}
            <div class="px-6 py-6 border-t border-gray-800">
                <p class="text-xs text-gray-400 font-light">© 2025 Rayzarchitecture</p>
            </div>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="w-full">
        {{-- Top bar --}}
        <header class="bg-black border-b border-neutral-800">
            <!-- Top Navigation Bar -->
            <div class="absolute top-0 left-0 right-0 z-20 bg-black">
                <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 py-2 flex items-center justify-between">
                    <!-- Logo -->
                    <a href="{{ route('home') }}" class="text-white text-lg font-light tracking-tight hover:text-gray-200 transition-colors duration-300">
                        RAYZ<span class="text-white/70">ARCHITECTURE</span>
                    </a>

                    <!-- Category Navigation (Desktop) -->
                    <nav class="hidden md:flex items-center gap-8 text-sm tracking-wider font-light">
                        <a class="text-white hover:text-gray-300 transition-colors duration-300 {{ request()->routeIs('architecture') ? 'text-gray-300' : '' }}"
                           href="{{ route('architecture') }}">ARCHITECTURE</a>
                        <a class="text-white hover:text-gray-300 transition-colors duration-300 {{ request()->routeIs('interior') ? 'text-gray-300' : '' }}"
                           href="{{ route('interior') }}">INTERIOR</a>
                        <a class="text-white hover:text-gray-300 transition-colors duration-300 {{ request()->routeIs('design') ? 'text-gray-300' : '' }}"
                           href="{{ route('design') }}">DESIGN</a>
                    </nav>

                    <!-- Menu Icon -->
                    <button onclick="openSidebar()" class="w-10 h-10 flex flex-col items-center justify-center gap-1.5 group">
                        <span class="w-7 h-0.5 bg-white transition-all duration-300 group-hover:w-5"></span>
                        <span class="w-7 h-0.5 bg-white transition-all duration-300"></span>
                        <span class="w-7 h-0.5 bg-white transition-all duration-300 group-hover:w-5"></span>
                    </button>
                </div>
            </div>
        </header>

        {{-- Content Area --}}
        <div>
            @if(session('success'))
                <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 pt-6">
                    <div class="mb-6 border-l-4 border-black bg-neutral-50 px-6 py-4 text-sm font-light">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @yield('content')
        </div>

        {{-- Footer --}}
        <footer class="bg-black text-white">
            <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 py-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
                    {{-- Left: Brand --}}
                    <div class="space-y-4">
                        <h4 class="text-3xl font-light tracking-tight">Rayzarch</h4>
                        <p class="text-sm text-gray-400 font-light tracking-wide">Your vision. Our precision</p>
                    </div>
                    
                    {{-- Right: Social Links --}}
                    <div class="flex items-center md:justify-end gap-3">
                        <a href="#" 
                           class="w-11 h-11 rounded-full border border-white/30 flex items-center justify-center hover:bg-white hover:text-black hover:border-white transition-all duration-300"
                           aria-label="Instagram">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" 
                           class="w-11 h-11 rounded-full border border-white/30 flex items-center justify-center hover:bg-white hover:text-black hover:border-white transition-all duration-300"
                           aria-label="Twitter">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                            </svg>
                        </a>
                        <a href="#" 
                           class="w-11 h-11 rounded-full border border-white/30 flex items-center justify-center hover:bg-white hover:text-black hover:border-white transition-all duration-300"
                           aria-label="GitHub">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                {{-- Bottom Links --}}
                <div class="pt-8 border-t border-gray-800/50 flex flex-col sm:flex-row justify-between items-center gap-6 text-xs text-gray-500">
                    <p class="font-light tracking-wide">© 2025 Rayzarchitecture. All rights reserved.</p>
                    <div class="flex flex-wrap justify-center gap-6">
                        <a href="#" class="hover:text-white transition-colors duration-300 font-light tracking-widest">PRIVACY POLICY</a>
                        <a href="#" class="hover:text-white transition-colors duration-300 font-light tracking-widest">TERMS & CONDITIONS</a>
                        <a href="#" class="hover:text-white transition-colors duration-300 font-light tracking-widest">ABOUT US</a>
                        <a href="#" class="hover:text-white transition-colors duration-300 font-light tracking-widest">FAQ</a>
                    </div>
                </div>
            </div>
        </footer>
    </main>

    {{-- JavaScript for Sidebar Toggle --}}
    <script>
        // Get elements
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const closeSidebar = document.getElementById('closeSidebar');
        
        // Function to open sidebar
        window.openSidebar = function() {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        };
        
        // Function to close sidebar
        function closeSidebarFunc() {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
            document.body.style.overflow = '';
        }
        
        // Event listeners
        closeSidebar.addEventListener('click', closeSidebarFunc);
        sidebarOverlay.addEventListener('click', closeSidebarFunc);
        
        // Close sidebar on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeSidebarFunc();
            }
        });
    </script>
</body>
</html>