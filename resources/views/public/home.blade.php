@extends('layouts.public')

@section('title', 'Home - Rayzarchitecture')

@section('content')
    <div class="min-h-screen bg-white">
        
        <!-- Hero Section with Image -->
        <div class="relative h-[60vh] sm:h-[70vh] lg:h-[80vh] overflow-hidden">
            <!-- Hero Image -->
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=1920" 
                    alt="Architecture Hero" 
                    class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black opacity-20"></div>
            </div>
        </div>

        <!-- Overlapping Content Section -->
        <div class="relative -mt-32 sm:-mt-40 lg:-mt-48 z-10 px-6 sm:px-8 lg:px-12">
            <div class="max-w-7xl mx-auto">
                
                <!-- Two Column Layout with Overlapping Boxes -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 mb-24">
                    
                    <!-- Left: White Box with Border (Text Content) -->
                    <div class="relative bg-white border-2 border-black p-8 sm:p-12 lg:p-16 order-2 lg:order-1 lg:-mr-16 z-20">
                        <div class="space-y-6">
                            <div class="space-y-2">
                                <p class="text-xs tracking-[0.25em] text-gray-500 font-light">ARCHITECTURE</p>
                                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-light text-black leading-tight tracking-tight">
                                    Modern Living<br>Spaces
                                </h2>
                            </div>
                            
                            <div class="w-16 h-px bg-black"></div>
                            
                            <p class="text-sm sm:text-base text-gray-600 leading-relaxed font-light">
                                Minimal preview grid (dummy). Nanti diganti data dari tabel Projects. Kami menciptakan ruang yang menginspirasi dengan pendekatan desain minimalis dan fungsional.
                            </p>
                            
                            <div class="pt-4">
                                <a href="{{ route('projects.index') }}"
                                    class="inline-flex items-center text-sm tracking-[0.15em] text-black hover:text-gray-600 transition-colors duration-300 group">
                                    <span class="font-light">EXPLORE PROJECTS</span>
                                    <svg class="w-5 h-5 ml-3 transform group-hover:translate-x-1 transition-transform duration-300" 
                                        fill="none" 
                                        stroke="currentColor" 
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Gray Box (Image Content) -->
                    <div class="relative bg-gray-200 aspect-[4/3] lg:aspect-auto lg:min-h-[400px] order-1 lg:order-2">
                        <img src="https://images.unsplash.com/photo-1600607687644-aac4c3eac7f4?w=800" 
                             alt="Interior Design" 
                             class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Second Row: Reversed Layout -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 mb-24">
                    
                    <!-- Left: Gray Box (Image Content) -->
                    <div class="relative bg-gray-200 aspect-[4/3] lg:aspect-auto lg:min-h-[450px]">
                        <img src="https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?w=800" 
                             alt="Architectural Detail" 
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Right: White Box with Border (Text Content) -->
                    <div class="relative bg-white border-2 border-black p-8 sm:p-12 lg:p-16 lg:-ml-16 z-20">
                        <div class="space-y-6">
                            <div class="space-y-2">
                                <p class="text-xs tracking-[0.25em] text-gray-500 font-light">DESIGN PHILOSOPHY</p>
                                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-light text-black leading-tight tracking-tight">
                                    Timeless<br>Elegance
                                </h2>
                            </div>
                            
                            <div class="w-16 h-px bg-black"></div>
                            
                            <p class="text-sm sm:text-base text-gray-600 leading-relaxed font-light">
                                Setiap proyek dirancang dengan perhatian terhadap detail, menggabungkan estetika kontemporer dengan fungsionalitas yang optimal untuk menciptakan ruang yang bermakna.
                            </p>
                            
                            <div class="pt-4">
                                <a href="{{ route('projects.index') }}"
                                   class="inline-flex items-center text-sm tracking-[0.15em] text-black hover:text-gray-600 transition-colors duration-300 group">
                                    <span class="font-light">VIEW PORTFOLIO</span>
                                    <svg class="w-5 h-5 ml-3 transform group-hover:translate-x-1 transition-transform duration-300" 
                                         fill="none" 
                                         stroke="currentColor" 
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image Carousel Section -->
                <div class="mb-24">
                    <div class="relative border-2 border-gray-300 rounded-lg overflow-hidden bg-gray-50 aspect-[16/9] max-w-4xl mx-auto">
                        <!-- Carousel Container -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=1200" 
                                 alt="Featured Project" 
                                 class="w-full h-full object-cover">
                        </div>
                        
                        <!-- Previous Button -->
                        <button class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white border border-black flex items-center justify-center hover:bg-black hover:text-white transition-colors duration-300 z-10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        
                        <!-- Next Button -->
                        <button class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white border border-black flex items-center justify-center hover:bg-black hover:text-white transition-colors duration-300 z-10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Vision Statement Section -->
        <div class="bg-white py-20 px-6 sm:px-8 lg:px-12">
            <div class="max-w-5xl mx-auto">
                <div class="flex flex-col sm:flex-row items-center gap-8 sm:gap-12">
                    <!-- Left: Gray Square -->
                    <div class="w-32 h-32 sm:w-40 sm:h-40 bg-gray-200 flex-shrink-0"></div>
                    
                    <!-- Right: Text Content -->
                    <div class="text-center sm:text-left space-y-2">
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-light text-black tracking-tight">
                            YOUR VISION
                        </h2>
                        <h3 class="text-3xl sm:text-4xl lg:text-5xl font-light text-black tracking-tight">
                            OUR PRECISION
                        </h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection