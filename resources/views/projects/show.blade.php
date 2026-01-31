@extends('layouts.public')

@section('title', $project->title . ' - Rayzarchitecture')

@section('content')
<div class="min-h-screen bg-white py-16 px-6 sm:px-8 lg:px-12">
    <div class="max-w-5xl mx-auto">

        <div class="mb-10">
            <a href="{{ route('projects.index') }}" class="text-xs tracking-[0.2em] text-gray-500 hover:text-black">
                ← BACK TO PROJECTS
            </a>
        </div>

        <div class="space-y-4 mb-10">
            <div class="flex items-center gap-3 text-[10px] tracking-[0.15em] text-gray-500 uppercase">
                <span>{{ $project->year ?? '—' }}</span>
                <span class="w-1 h-1 rounded-full bg-gray-400"></span>
                <span>{{ $project->category }}</span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-light tracking-tight text-black">
                {{ $project->title }}
            </h1>

            @if($project->description)
                <p class="text-base text-gray-700 font-light leading-relaxed max-w-3xl">
                    {{ $project->description }}
                </p>
            @endif
        </div>

        {{-- Cover --}}
        <div class="border border-gray-300 overflow-hidden mb-10">
            <div class="relative aspect-[16/9] bg-gray-100">
                @if($project->cover_image)
                    <img src="{{ asset('storage/' . $project->cover_image) }}"
                         alt="{{ $project->title }}"
                         class="absolute inset-0 w-full h-full object-cover" />
                @else
                    <div class="absolute inset-0 bg-gradient-to-br from-gray-200 to-white"></div>
                @endif
            </div>
        </div>

        {{-- Gallery --}}
        @if(is_array($project->gallery) && count($project->gallery))
            <div class="mt-12">
                <div class="mb-6">
                    <h2 class="text-xl font-light tracking-tight text-black">Gallery</h2>
                    <div class="h-px bg-black mt-3 w-16"></div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @foreach($project->gallery as $img)
                        <div class="border border-gray-300 overflow-hidden bg-gray-100">
                            <div class="relative aspect-[4/3]">
                                <img src="{{ asset('storage/' . $img) }}"
                                     alt="Gallery image"
                                     class="absolute inset-0 w-full h-full object-cover" />
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>
@endsection
