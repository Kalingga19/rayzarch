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

            {{-- Filter Section --}}
            <div class="mb-12 pb-8 border-b border-gray-300">
            <p class="text-xs tracking-[0.2em] text-gray-500 mb-4">FILTER BY CATEGORY</p>

            @php
                $filters = [
                null => 'ALL',
                'sketch' => 'SKETCH',
                'layout' => 'LAYOUT',
                'experiment' => 'EXPERIMENT',
                ];
            @endphp

            <div class="flex flex-wrap gap-3">
                @foreach($filters as $key => $label)
                @php
                    $isActive = ($category ?? null) === $key;
                    $href = $key ? request()->fullUrlWithQuery(['category' => $key, 'page' => 1]) : url()->current();
                @endphp

                <a href="{{ $href }}"
                    class="{{ $isActive
                        ? 'px-6 py-2 border-2 border-black bg-black text-white text-xs tracking-[0.1em] font-light transition-all duration-300 hover:bg-white hover:text-black'
                        : 'px-6 py-2 border border-gray-300 text-black text-xs tracking-[0.1em] font-light hover:border-black transition-all duration-300'
                    }}">
                    {{ $label }}
                </a>
                @endforeach
            </div>
            </div>

            {{-- Media Grid --}}
            @if($notes->count() === 0)
            <div class="border border-gray-300 p-10 text-center text-gray-600 font-light">
                Belum ada uploads untuk kategori ini.
            </div>
            @else
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                @foreach($notes as $note)
                <a href="{{ route('notes.show', $note) }}" class="group block cursor-pointer">
                    {{-- Image Container --}}
                    <div class="relative aspect-[4/5] border border-gray-300 bg-gray-50 overflow-hidden hover:border-black transition-all duration-300">

                    @php
                        // sesuaikan dengan struktur Note kamu:
                        // opsi 1: $note->cover_image
                        // opsi 2: $note->images[0]
                        $img = $note->cover_image ?? (is_array($note->images ?? null) ? ($note->images[0] ?? null) : null);
                    @endphp

                    @if($img)
                        <img
                        src="{{ asset('storage/' . $img) }}"
                        alt="{{ $note->title ?? 'Note' }}"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out"
                        />
                    @else
                        {{-- fallback gradient --}}
                        <div class="absolute inset-0 bg-gradient-to-br from-gray-100 to-white group-hover:scale-110 transition-transform duration-700 ease-out"></div>
                    @endif

                    {{-- Overlay --}}
                    <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-30 transition-opacity duration-300"></div>

                    {{-- Zoom Icon --}}
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="w-10 h-10 border border-white flex items-center justify-center bg-black bg-opacity-40 backdrop-blur-sm">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        </div>
                    </div>
                    </div>

                    {{-- Content --}}
                    <div class="mt-3 space-y-1">
                    <p class="text-[10px] tracking-[0.15em] text-gray-500 uppercase">
                        {{ strtoupper($note->category ?? 'NOTE') }}
                    </p>
                    <p class="text-sm font-light text-black group-hover:text-gray-600 transition-colors duration-300">
                        {{ $note->title ?? 'Untitled Note' }}
                    </p>
                    </div>
                </a>
                @endforeach
            </div>

            {{-- Pagination Section --}}
            <div class="mt-16 pt-12 border-t border-gray-300 text-center space-y-6">
                <p class="text-xs tracking-[0.2em] text-gray-400">
                SHOWING {{ $notes->count() }} OF {{ $notes->total() }} ITEMS
                </p>

                <div class="flex justify-center">
                {{ $notes->links() }}
                </div>
            </div>
            @endif

            <!-- Bottom Decoration -->
            <div class="mt-20 text-center">
                <div class="h-px bg-gradient-to-r from-transparent via-gray-400 to-transparent w-64 mx-auto"></div>
            </div>

        </div>
    </div>
@endsection