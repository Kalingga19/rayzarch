@extends('layouts.public')

@section('title', $title . ' - Rayzarchitecture')

@section('content')
    <div class="min-h-screen bg-white py-12 px-6 sm:px-8 lg:px-12">
        <div class="max-w-7xl mx-auto">
            
            <!-- Header Section -->
            <div class="mb-16 space-y-6">
                <div class="space-y-3">
                    <div class="inline-block">
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-light tracking-tight text-black">
                            {{ $title }}
                        </h1>
                        <div class="h-px bg-black mt-4 w-16"></div>
                    </div>
                    
                    <p class="text-base sm:text-lg text-gray-600 font-light tracking-wide max-w-2xl">
                        {{ $subtitle }}
                    </p>
                </div>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
                @for($i=1; $i<=8; $i++)
                    <div class="group cursor-pointer">
                        <div class="aspect-[4/5] border border-gray-300 bg-gray-50 overflow-hidden relative transition-all duration-300 hover:border-black">
                            <!-- Placeholder dengan gradient monokrom -->
                            <div class="w-full h-full bg-gradient-to-br {{ $i % 4 == 0 ? 'from-black to-gray-700' : ($i % 3 == 0 ? 'from-gray-800 to-gray-600' : ($i % 2 == 0 ? 'from-gray-200 to-gray-100' : 'from-gray-100 to-white')) }} group-hover:scale-105 transition-transform duration-500"></div>
                            
                            <!-- Overlay on hover -->
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-300"></div>
                            
                            <!-- Number indicator -->
                            <div class="absolute bottom-4 right-4 w-8 h-8 border border-white bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span class="text-white text-xs font-light">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</span>
                            </div>
                        </div>
                        
                        <!-- Caption below image -->
                        <div class="mt-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <p class="text-xs tracking-[0.15em] text-gray-500">PROJECT {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</p>
                            <p class="text-sm text-black font-light mt-1">Title Placeholder</p>
                        </div>
                    </div>
                @endfor
            </div>

            <!-- Bottom Divider -->
            <div class="mt-20 pt-12 border-t border-gray-300">
                <p class="text-xs tracking-[0.2em] text-gray-400 text-center">
                    END OF GALLERY
                </p>
            </div>

        </div>
    </div>
@endsection