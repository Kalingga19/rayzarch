@extends('layouts.public')

@section('title', 'Contact - Rayzarchitecture')

@section('content')
    <div class="min-h-screen bg-white py-16 px-6 sm:px-8 lg:px-12">
        <div class="max-w-4xl mx-auto">
            
            <!-- Header Section -->
            <div class="mb-20 space-y-6">
                <div class="inline-block">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-light tracking-tight text-black">
                        Contact
                    </h1>
                    <div class="h-px bg-black mt-4 w-20"></div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="space-y-16">
                
                <!-- Email Section -->
                <div class="border-l-2 border-black pl-8 py-2">
                    <p class="text-xs tracking-[0.2em] text-gray-500 mb-4">EMAIL</p>
                    <a class="text-xl sm:text-2xl font-light text-black hover:text-gray-600 transition-colors duration-300 inline-block group" 
                       href="mailto:rayzarchitecture1908@gmail.com">
                        rayzarchitecture1908@gmail.com
                        <div class="h-px bg-black w-0 group-hover:w-full transition-all duration-300"></div>
                    </a>
                </div>

                <!-- Social Media Section -->
                <div class="border-l-2 border-black pl-8 py-2">
                    <p class="text-xs tracking-[0.2em] text-gray-500 mb-6">SOCIAL MEDIA</p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a class="group inline-flex items-center justify-center px-8 py-4 border-2 border-black text-black bg-white hover:bg-black hover:text-white transition-all duration-300" 
                           href="https://www.instagram.com/rayzarchitecture/?utm_source=ig_web_button_share_sheet" 
                           target="_blank">
                            <span class="text-sm tracking-[0.1em] font-light">INSTAGRAM</span>
                            <svg class="w-4 h-4 ml-3 transform group-hover:translate-x-1 transition-transform duration-300" 
                                 fill="none" 
                                 stroke="currentColor" 
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <a class="group inline-flex items-center justify-center px-8 py-4 border-2 border-black text-black bg-white hover:bg-black hover:text-white transition-all duration-300" 
                           href="https://www.linkedin.com/in/rakaaryasadewa/" 
                           target="_blank">
                            <span class="text-sm tracking-[0.1em] font-light">LINKEDIN</span>
                            <svg class="w-4 h-4 ml-3 transform group-hover:translate-x-1 transition-transform duration-300" 
                                 fill="none" 
                                 stroke="currentColor" 
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Divider -->
                <div class="pt-16 border-t border-gray-300">
                    <div class="grid md:grid-cols-2 gap-12">
                        <!-- Office Hours -->
                        <div>
                            <p class="text-xs tracking-[0.2em] text-gray-500 mb-4">OFFICE HOURS</p>
                            <div class="space-y-2 text-sm font-light">
                                <p class="text-black">Monday - Friday</p>
                                <p class="text-gray-600">09:00 - 17:00 WIB</p>
                            </div>
                        </div>
                        
                        <!-- Location -->
                        <div>
                            <p class="text-xs tracking-[0.2em] text-gray-500 mb-4">LOCATION</p>
                            <p class="text-sm font-light text-black leading-relaxed">
                                Karanganyar, Central Java<br>
                                Indonesia
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Quote -->
            <div class="mt-32 text-center">
                <p class="text-xl sm:text-2xl font-light text-black tracking-tight">
                    Let's create something together
                </p>
                <div class="h-px bg-gradient-to-r from-transparent via-black to-transparent mt-6 w-48 mx-auto"></div>
            </div>

        </div>
    </div>
@endsection