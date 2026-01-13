@extends('layouts.public')

@section('title', 'Services - Rayzarchitecture')

@section('content')
    <div class="min-h-screen bg-white py-16 px-6 sm:px-8 lg:px-12">
        <div class="max-w-6xl mx-auto">
            
            <!-- Header Section -->
            <div class="mb-20 space-y-6">
                <div class="inline-block">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-light tracking-tight text-black">
                        Services
                    </h1>
                    <div class="h-px bg-black mt-4 w-20"></div>
                </div>
                
                <p class="text-base sm:text-lg text-gray-600 font-light tracking-wide max-w-2xl">
                    Jasa desain & visualisasi (placeholder).
                </p>
            </div>

            <!-- Services Grid -->
            <div class="grid sm:grid-cols-2 gap-6 lg:gap-8 mb-20">
                @foreach([
                    '3D Rendering',
                    'Floor Plan / Denah',
                    'Interior Layout',
                    'Facade / Exterior Concept',
                ] as $index => $svc)
                    <div class="group border-2 border-gray-300 p-8 hover:border-black transition-all duration-300 relative overflow-hidden">
                        <!-- Number Badge -->
                        <div class="absolute top-6 right-6 w-12 h-12 border border-gray-300 group-hover:border-black flex items-center justify-center transition-colors duration-300">
                            <span class="text-xs font-light text-gray-500 group-hover:text-black">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        </div>

                        <!-- Service Content -->
                        <div class="space-y-4 pr-16">
                            <div>
                                <p class="text-xs tracking-[0.2em] text-gray-500 mb-3">SERVICE</p>
                                <h3 class="text-xl sm:text-2xl font-light text-black tracking-tight">
                                    {{ $svc }}
                                </h3>
                            </div>
                            
                            <p class="text-sm text-gray-600 font-light leading-relaxed">
                                Deskripsi singkat layanan.
                            </p>

                            <!-- Arrow Icon -->
                            <div class="pt-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="w-10 h-10 border border-black flex items-center justify-center">
                                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Hover Background Effect -->
                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-5 transition-opacity duration-300 pointer-events-none"></div>
                    </div>
                @endforeach
            </div>

            <!-- CTA Section -->
            <div class="border-t-2 border-gray-300 pt-16">
                <div class="max-w-3xl mx-auto text-center space-y-8">
                    <div class="space-y-4">
                        <p class="text-xs tracking-[0.2em] text-gray-500">GET STARTED</p>
                        <h2 class="text-2xl sm:text-3xl font-light text-black tracking-tight">
                            Ready to bring your vision to life?
                        </h2>
                        <p class="text-sm text-gray-600 font-light max-w-xl mx-auto">
                            Contact us to discuss your project requirements and receive a personalized quote.
                        </p>
                    </div>

                    <a class="group inline-flex items-center justify-center px-10 py-5 bg-black text-white hover:bg-white hover:text-black border-2 border-black transition-all duration-300"
                       href="mailto:rayzarchitecture1908@gmail.com">
                        <span class="text-sm tracking-[0.1em] font-light">REQUEST SERVICE VIA EMAIL</span>
                        <svg class="w-4 h-4 ml-3 transform group-hover:translate-x-1 transition-transform duration-300" 
                             fill="none" 
                             stroke="currentColor" 
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>

                    <!-- Contact Info -->
                    <div class="pt-8 border-t border-gray-300 mt-12">
                        <p class="text-xs tracking-[0.15em] text-gray-400">OR EMAIL US DIRECTLY</p>
                        <a href="mailto:rayzarchitecture1908@gmail.com" 
                           class="inline-block mt-3 text-base text-black hover:text-gray-600 transition-colors duration-300 font-light group">
                            rayzarchitecture1908@gmail.com
                            <div class="h-px bg-black w-0 group-hover:w-full transition-all duration-300"></div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bottom Decoration -->
            <div class="mt-24 text-center">
                <div class="h-px bg-gradient-to-r from-transparent via-gray-400 to-transparent w-64 mx-auto"></div>
            </div>

        </div>
    </div>
@endsection