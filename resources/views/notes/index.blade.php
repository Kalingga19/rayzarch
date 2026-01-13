@extends('layouts.public')

@section('title', 'Media - Rayzarchitecture')

@section('content')
    <div class="min-h-screen bg-white py-16 px-6 sm:px-8 lg:px-12">
        <div class="max-w-7xl mx-auto">
            
            <!-- Header Section -->
            <div class="mb-16 space-y-6">
                <div class="inline-block">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-light tracking-tight text-black">
                        Media
                    </h1>
                    <div class="h-px bg-black mt-4 w-20"></div>
                </div>
                
                <p class="text-base sm:text-lg text-gray-600 font-light tracking-wide max-w-2xl">
                    Upload sketsa / layout / eksperimen (placeholder).
                </p>
            </div>

            <!-- Filter Section -->
            <div class="mb-12 pb-8 border-b border-gray-300">
                <p class="text-xs tracking-[0.2em] text-gray-500 mb-4">FILTER BY CATEGORY</p>
                <div class="flex flex-wrap gap-3">
                    <button class="px-6 py-2 border-2 border-black bg-black text-white text-xs tracking-[0.1em] font-light transition-all duration-300 hover:bg-white hover:text-black">
                        ALL
                    </button>
                    <button class="px-6 py-2 border border-gray-300 text-black text-xs tracking-[0.1em] font-light hover:border-black transition-all duration-300">
                        SKETCH
                    </button>
                    <button class="px-6 py-2 border border-gray-300 text-black text-xs tracking-[0.1em] font-light hover:border-black transition-all duration-300">
                        LAYOUT
                    </button>
                    <button class="px-6 py-2 border border-gray-300 text-black text-xs tracking-[0.1em] font-light hover:border-black transition-all duration-300">
                        EXPERIMENT
                    </button>
                </div>
            </div>

            <!-- Media Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                @for($i=1; $i<=12; $i++)
                    <div class="group cursor-pointer">
                        <!-- Image Container -->
                        <div class="relative aspect-[4/5] border border-gray-300 bg-gray-50 overflow-hidden hover:border-black transition-all duration-300">
                            <!-- Gradient Background -->
                            <div class="absolute inset-0 bg-gradient-to-br {{ $i % 6 == 0 ? 'from-black via-gray-800 to-gray-600' : ($i % 5 == 0 ? 'from-gray-800 to-gray-700' : ($i % 4 == 0 ? 'from-gray-600 to-gray-400' : ($i % 3 == 0 ? 'from-gray-300 to-gray-200' : ($i % 2 == 0 ? 'from-gray-200 to-gray-100' : 'from-gray-100 to-white')))) }} group-hover:scale-110 transition-transform duration-700 ease-out"></div>
                            
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-30 transition-opacity duration-300"></div>

                            <!-- Number Badge -->
                            <div class="absolute top-3 right-3 w-8 h-8 border border-white bg-black bg-opacity-60 backdrop-blur-sm flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span class="text-white text-[10px] font-light">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</span>
                            </div>

                            <!-- Zoom Icon -->
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="w-10 h-10 border border-white flex items-center justify-center bg-black bg-opacity-40 backdrop-blur-sm">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="mt-3 space-y-1">
                            <p class="text-[10px] tracking-[0.15em] text-gray-500 uppercase">
                                {{ $i % 3 == 0 ? 'SKETCH' : ($i % 2 == 0 ? 'LAYOUT' : 'EXPERIMENT') }}
                            </p>
                            <p class="text-sm font-light text-black group-hover:text-gray-600 transition-colors duration-300">
                                Note {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                            </p>
                        </div>
                    </div>
                @endfor
            </div>

            <!-- Load More Section -->
            <div class="mt-16 pt-12 border-t border-gray-300">
                <div class="text-center space-y-6">
                    <p class="text-xs tracking-[0.2em] text-gray-400">SHOWING 12 OF 12 ITEMS</p>
                    
                    <button class="group inline-flex items-center justify-center px-10 py-4 border-2 border-black text-black bg-white hover:bg-black hover:text-white transition-all duration-300">
                        <span class="text-sm tracking-[0.1em] font-light">LOAD MORE</span>
                        <svg class="w-4 h-4 ml-3 transform group-hover:translate-y-1 transition-transform duration-300" 
                             fill="none" 
                             stroke="currentColor" 
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Bottom Decoration -->
            <div class="mt-20 text-center">
                <div class="h-px bg-gradient-to-r from-transparent via-gray-400 to-transparent w-64 mx-auto"></div>
            </div>

        </div>
    </div>
@endsection