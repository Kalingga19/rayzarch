@extends('layouts.public')

@section('title', 'Notes')

@section('content')
<div class="min-h-screen bg-white py-16 px-6 sm:px-8 lg:px-12">
    <div class="max-w-6xl mx-auto">

        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-16">
            <div class="space-y-4">
                <div class="inline-block">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-light tracking-tight text-black">
                        Notes
                    </h1>
                    <div class="h-px bg-black mt-4 w-20"></div>
                </div>
                <p class="text-base text-gray-600 font-light tracking-wide">
                    Uploads for Media page
                </p>
            </div>

            <a href="{{ route('admin.notes.create') }}"
               class="group inline-flex items-center justify-center px-8 py-4 border-2 border-black bg-black text-white hover:bg-white hover:text-black transition-all duration-300 self-start sm:self-auto">
                <span class="text-xs tracking-[0.2em] font-light">CREATE</span>
                <svg class="w-4 h-4 ml-3 transform group-hover:rotate-90 transition-transform duration-300"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-10 border-l-2 border-black bg-gray-50 p-5 flex items-start gap-4">
                <div class="w-6 h-6 border border-black flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-3 h-3 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs tracking-[0.15em] text-gray-500 mb-1">SUCCESS</p>
                    <p class="text-sm text-black font-light">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Table Section -->
        <div class="border-t-2 border-black">
            <!-- Table Header -->
            <div class="grid grid-cols-12 gap-4 py-4 border-b border-gray-300">
                <div class="col-span-4">
                    <p class="text-[10px] tracking-[0.2em] text-gray-500">TITLE</p>
                </div>
                <div class="col-span-2">
                    <p class="text-[10px] tracking-[0.2em] text-gray-500">CATEGORY</p>
                </div>
                <div class="col-span-2">
                    <p class="text-[10px] tracking-[0.2em] text-gray-500">IMAGES</p>
                </div>
                <div class="col-span-2">
                    <p class="text-[10px] tracking-[0.2em] text-gray-500">CREATED</p>
                </div>
                <div class="col-span-2 text-right">
                    <p class="text-[10px] tracking-[0.2em] text-gray-500">ACTION</p>
                </div>
            </div>

            <!-- Table Body -->
            @forelse($notes as $index => $note)
                <div class="grid grid-cols-12 gap-4 py-5 border-b border-gray-200 items-center group hover:bg-gray-50 transition-colors duration-200 -mx-4 px-4">
                    <!-- Title -->
                    <div class="col-span-4 flex items-center gap-4">
                        <div class="w-8 h-8 border border-gray-300 group-hover:border-black flex items-center justify-center transition-colors duration-300">
                            <span class="text-[10px] font-light text-gray-500 group-hover:text-black">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <p class="text-sm font-light text-black">{{ $note->title }}</p>
                    </div>

                    <!-- Category -->
                    <div class="col-span-2">
                        <span class="inline-block px-3 py-1 border border-gray-300 group-hover:border-black text-[10px] tracking-[0.15em] text-gray-600 transition-colors duration-300">
                            {{ $note->category ?? '—' }}
                        </span>
                    </div>

                    <!-- Images Count -->
                    <div class="col-span-2">
                        <div class="flex items-center gap-2">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-sm font-light text-gray-600">
                                {{ is_array($note->images) ? count($note->images) : 0 }}
                            </p>
                        </div>
                    </div>

                    <!-- Created Date -->
                    <div class="col-span-2">
                        <p class="text-sm font-light text-gray-500">{{ $note->created_at->format('d M Y') }}</p>
                    </div>

                    <!-- Action -->
                    <div class="col-span-2 text-right">
                        <form action="{{ route('admin.notes.destroy', $note) }}" method="POST" onsubmit="return confirm('Delete this note?')">
                            @csrf
                            @method('DELETE')
                            <button class="group/del inline-flex items-center gap-2 px-4 py-2 border border-gray-300 hover:border-red-600 text-gray-500 hover:text-red-600 transition-all duration-300">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                <span class="text-[10px] tracking-[0.15em] font-light">DELETE</span>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="py-20 text-center">
                    <div class="w-16 h-16 border-2 border-gray-300 mx-auto flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <p class="text-xs tracking-[0.2em] text-gray-400 mb-2">EMPTY</p>
                    <p class="text-sm font-light text-gray-500 mb-6">No notes yet. Start by creating one.</p>
                    <a href="{{ route('admin.notes.create') }}"
                       class="inline-flex items-center px-6 py-3 border-2 border-black text-black hover:bg-black hover:text-white transition-all duration-300">
                        <span class="text-xs tracking-[0.15em] font-light">CREATE NOTE</span>
                    </a>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-10 flex justify-center">
            {{ $notes->links() }}
        </div>

    </div>
</div>
@endsection