@extends('layouts.public')

@section('title', 'About - Rayzarchitecture')

@section('content')
    <div class="min-h-screen bg-white py-16 px-6 sm:px-8 lg:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-16 lg:gap-24 items-start">
                
                <!-- Left Column - Content -->
                <div class="space-y-12">
                    <!-- Header -->
                    <div class="space-y-6">
                        <div class="inline-block">
                            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-light tracking-tight text-black">
                                About
                            </h1>
                            <div class="h-px bg-black mt-4 w-20"></div>
                        </div>
                        
                        <p class="text-base sm:text-lg text-gray-700 leading-relaxed max-w-xl font-light">
                            Rayzarchitecture adalah studio desain yang fokus pada arsitektur, interior, dan visualisasi.
                            (Ini placeholder — nanti isi dari database About).
                        </p>
                    </div>

                    <!-- Profile Card -->
                    <div class="border border-black p-8 bg-white hover:bg-black hover:text-white transition-all duration-300 group">
                        <p class="text-xs tracking-[0.2em] text-gray-500 group-hover:text-gray-300 mb-4">
                            PROFILE
                        </p>
                        <p class="text-2xl font-light mb-2">Rayz</p>
                        <p class="text-sm text-gray-600 group-hover:text-gray-300 font-light tracking-wide">
                            Architecture & Interior Designer
                        </p>
                    </div>

                    <!-- Motto Section -->
                    <div class="space-y-4 pt-8 border-t border-gray-300">
                        <span class="text-xs tracking-[0.2em] text-gray-500">MOTTO</span>
                        <div class="text-2xl sm:text-3xl font-light tracking-tight text-black leading-tight">
                            YOUR VISION,<br>OUR PRECISION
                        </div>
                    </div>
                </div>

                <!-- Right Column - Images -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div class="aspect-[3/4] bg-gray-100 border border-gray-300 overflow-hidden group">
                            <div class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-100 group-hover:from-black group-hover:to-gray-800 transition-all duration-500"></div>
                        </div>
                        <div class="aspect-square bg-gray-100 border border-gray-300 overflow-hidden group">
                            <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 group-hover:from-gray-800 group-hover:to-black transition-all duration-500"></div>
                        </div>
                    </div>
                    <div class="space-y-4 pt-12">
                        <div class="aspect-square bg-gray-100 border border-gray-300 overflow-hidden group">
                            <div class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-100 group-hover:from-black group-hover:to-gray-800 transition-all duration-500"></div>
                        </div>
                        <div class="aspect-[3/4] bg-gray-100 border border-gray-300 overflow-hidden group">
                            <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 group-hover:from-gray-800 group-hover:to-black transition-all duration-500"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection