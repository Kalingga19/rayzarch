@extends('layouts.public')

@section('title', 'Projects - Rayzarchitecture')

@section('content')
    <div class="min-h-screen bg-white py-16 px-6 sm:px-8 lg:px-12">
        <div class="max-w-7xl mx-auto">
            
            <!-- Header Section -->
            <div class="mb-20 flex flex-col lg:flex-row lg:items-end lg:justify-between gap-8">
                <div class="space-y-6">
                    <div class="inline-block">
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-light tracking-tight text-black">
                            Projects
                        </h1>
                        <div class="h-px bg-black mt-4 w-20"></div>
                    </div>
                    
                    <p class="text-base sm:text-lg text-gray-600 font-light tracking-wide max-w-2xl">
                        Ini versi minimal. Nanti diisi dari DB + pagination.
                    </p>
                </div>

                <a href="{{ route('services') }}"
                   class="group inline-flex items-center justify-center px-8 py-4 border-2 border-black text-black bg-white hover:bg-black hover:text-white transition-all duration-300 self-start lg:self-auto">
                    <span class="text-sm tracking-[0.1em] font-light">VIEW SERVICES</span>
                    <svg class="w-4 h-4 ml-3 transform group-hover:translate-x-1 transition-transform duration-300" 
                         fill="none" 
                         stroke="currentColor" 
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @for($i=1; $i<=9; $i++)
                    <a href="{{ route('projects.index') }}"
                       class="group block border border-gray-300 overflow-hidden hover:border-black transition-all duration-300">
                        
                        <!-- Image Container -->
                        <div class="relative aspect-[16/10] bg-gray-100 overflow-hidden">
                            <!-- Gradient Background -->
                            <div class="absolute inset-0 bg-gradient-to-br {{ $i % 5 == 0 ? 'from-black to-gray-700' : ($i % 4 == 0 ? 'from-gray-800 to-gray-600' : ($i % 3 == 0 ? 'from-gray-300 to-gray-100' : ($i % 2 == 0 ? 'from-gray-200 to-white' : 'from-gray-100 to-gray-50'))) }} group-hover:scale-105 transition-transform duration-700 ease-out"></div>
                            
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>

                            <!-- Number Badge -->
                            <div class="absolute top-4 right-4 w-10 h-10 border border-white bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span class="text-white text-xs font-light">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</span>
                            </div>

                            <!-- View Icon -->
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="w-12 h-12 border-2 border-white flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6 bg-white group-hover:bg-gray-50 transition-colors duration-300">
                            <div class="flex items-center gap-3 text-[10px] tracking-[0.15em] text-gray-500 mb-3">
                                <span>2026</span>
                                <span class="w-1 h-1 rounded-full bg-gray-400"></span>
                                <span>DESIGN</span>
                            </div>
                            
                            <h3 class="text-lg font-light text-black tracking-tight mb-2 group-hover:text-gray-700 transition-colors duration-300">
                                Project {{ $i }}
                            </h3>
                            
                            <p class="text-sm text-gray-600 font-light leading-relaxed line-clamp-2">
                                Deskripsi singkat project (placeholder).
                            </p>

                            <!-- Read More Link -->
                            <div class="mt-4 flex items-center gap-2 text-xs tracking-wide text-black opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span class="font-light">VIEW PROJECT</span>
                                <svg class="w-3 h-3 transform group-hover:translate-x-1 transition-transform duration-300" 
                                     fill="none" 
                                     stroke="currentColor" 
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </div>
                        </div>
                    </a>
                @endfor
            </div>

            <!-- Bottom Section -->
            <div class="mt-24 pt-12 border-t border-gray-300">
                <div class="text-center space-y-6">
                    <p class="text-xs tracking-[0.2em] text-gray-400">END OF PROJECTS</p>
                    <p class="text-sm text-gray-600 font-light">Showing 9 of 9 projects</p>
                    
                    <!-- Pagination Placeholder -->
                    <div class="flex justify-center gap-2 pt-4">
                        <button class="w-10 h-10 border-2 border-black bg-black text-white flex items-center justify-center text-sm font-light">1</button>
                        <button class="w-10 h-10 border border-gray-300 hover:border-black text-black flex items-center justify-center text-sm font-light transition-colors duration-300">2</button>
                        <button class="w-10 h-10 border border-gray-300 hover:border-black text-black flex items-center justify-center text-sm font-light transition-colors duration-300">3</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection