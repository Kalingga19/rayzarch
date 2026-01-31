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
            @if(($projects ?? collect())->count() === 0)
                <div class="border border-gray-300 p-10 text-center text-gray-600 font-light">
                    Belum ada project untuk kategori ini.
                </div>
            @else
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
                    @foreach($projects as $project)
                        <a href="{{ route('projects.show', $project->slug) }}" class="group block cursor-pointer">
                            <div class="aspect-[4/5] border border-gray-300 bg-gray-50 overflow-hidden relative transition-all duration-300 hover:border-black">

                                @if($project->cover_image)
                                    <img
                                        src="{{ asset('storage/' . $project->cover_image) }}"
                                        alt="{{ $project->title }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    />
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-gray-100 to-white group-hover:scale-105 transition-transform duration-500"></div>
                                @endif

                                <!-- Overlay on hover -->
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-300"></div>

                                <!-- Year indicator -->
                                <div class="absolute bottom-4 right-4 px-3 py-2 border border-white bg-black bg-opacity-50 backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="text-white text-xs font-light tracking-wider">
                                        {{ $project->year ?? '—' }}
                                    </span>
                                </div>
                            </div>

                            <!-- Caption below image -->
                            <div class="mt-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="text-xs tracking-[0.15em] text-gray-500 uppercase">
                                    {{ $project->category }}
                                </p>
                                <p class="text-sm text-black font-light mt-1">
                                    {{ $project->title }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="flex justify-center pt-10">
                    {{ $projects->links() }}
                </div>
            @endif

            <!-- Bottom Divider -->
            <div class="mt-20 pt-12 border-t border-gray-300">
                <p class="text-xs tracking-[0.2em] text-gray-400 text-center">
                    END OF GALLERY
                </p>
            </div>

        </div>
    </div>
@endsection