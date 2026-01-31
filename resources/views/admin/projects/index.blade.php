@extends('layouts.public')

@section('title', 'Admin Projects')

@section('content')
<div class="min-h-screen bg-white py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        
        <!-- Header Section -->
        <div class="border-b border-neutral-200 pb-8 mb-10">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
                <div>
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-2 h-2 bg-black rounded-full"></div>
                        <h1 class="text-4xl sm:text-5xl font-light tracking-tight text-black">
                            Projects
                        </h1>
                    </div>
                    <p class="text-base text-neutral-500 font-light tracking-wide">
                        Manage your architecture portfolio
                    </p>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('admin.projects.create') }}" 
                       class="group inline-flex items-center justify-center gap-2 px-8 py-3 bg-black text-white text-sm uppercase tracking-wider font-medium hover:bg-neutral-800 transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>New Project</span>
                    </a>
                    
                    <a href="{{ route('home') }}" 
                       class="inline-flex items-center justify-center gap-2 px-8 py-3 bg-white border-2 border-black text-black text-sm uppercase tracking-wider font-medium hover:bg-black hover:text-white transition-all duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span>Back to Site</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Projects Count -->
        <div class="mb-8">
            <div class="inline-flex items-center gap-3 px-6 py-3 bg-neutral-50 border border-neutral-200">
                <svg class="w-5 h-5 text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
                <span class="text-sm text-neutral-600 font-light tracking-wide">
                    Total: <span class="font-medium text-black">{{ $projects->total() }}</span> project(s)
                </span>
            </div>
        </div>

        <!-- Projects List -->
        @if($projects->count() > 0)
        <div class="space-y-4">
            @foreach($projects as $p)
                <div class="group relative border-2 border-neutral-200 hover:border-black transition-all duration-300 bg-white">
                    <div class="p-6 sm:p-8">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                            
                            <!-- Project Info -->
                            <div class="flex-1 min-w-0 space-y-3">
                                <!-- Category & Year Badge -->
                                <div class="flex items-center gap-3 flex-wrap">
                                    <span class="inline-flex items-center px-3 py-1 bg-black text-white text-xs uppercase tracking-widest font-medium">
                                        {{ strtoupper($p->category) }}
                                    </span>
                                    @if($p->year)
                                    <span class="text-xs text-neutral-500 font-light tracking-wide">
                                        {{ $p->year }}
                                    </span>
                                    @endif
                                </div>
                                
                                <!-- Title -->
                                <h3 class="text-2xl font-light text-black tracking-tight group-hover:text-neutral-600 transition-colors duration-300">
                                    {{ $p->title }}
                                </h3>
                                
                                <!-- Slug -->
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                    </svg>
                                    <code class="text-sm text-neutral-500 font-mono tracking-tight">/{{ $p->slug }}</code>
                                </div>

                                <!-- Description Preview (if exists) -->
                                @if($p->description)
                                <p class="text-sm text-neutral-600 font-light leading-relaxed line-clamp-2">
                                    {{ Str::limit($p->description, 120) }}
                                </p>
                                @endif
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="flex lg:flex-col gap-3 lg:items-end shrink-0">
                                <a href="{{ route('admin.projects.edit', $p) }}" 
                                   class="flex-1 lg:flex-initial inline-flex items-center justify-center gap-2 px-6 py-3 border-2 border-black text-black text-xs uppercase tracking-wider font-medium hover:bg-black hover:text-white transition-all duration-300 group/edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    <span>Edit</span>
                                </a>
                                
                                <form method="POST" 
                                      action="{{ route('admin.projects.destroy', $p) }}" 
                                      onsubmit="return confirm('Are you sure you want to delete this project? This action cannot be undone.')"
                                      class="flex-1 lg:flex-initial">
                                    @csrf 
                                    @method('DELETE')
                                    <button 
                                        type="submit"
                                        class="w-full inline-flex items-center justify-center gap-2 px-6 py-3 border-2 border-neutral-300 text-neutral-600 text-xs uppercase tracking-wider font-medium hover:border-red-600 hover:bg-red-600 hover:text-white transition-all duration-300 group/delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        <span>Delete</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Hover Border Effect -->
                    <div class="absolute bottom-0 left-0 w-0 h-1 bg-black group-hover:w-full transition-all duration-500 ease-out"></div>
                </div>
            @endforeach
        </div>
        @else
        <!-- Empty State -->
        <div class="text-center py-20 border-2 border-dashed border-neutral-300">
            <svg class="w-20 h-20 mx-auto mb-6 text-neutral-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
            </svg>
            <h3 class="text-2xl font-light text-neutral-400 mb-3">No projects yet</h3>
            <p class="text-sm text-neutral-500 font-light mb-6">Start by creating your first project</p>
            <a href="{{ route('admin.projects.create') }}" 
               class="inline-flex items-center gap-2 px-8 py-3 bg-black text-white text-sm uppercase tracking-wider font-medium hover:bg-neutral-800 transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span>Create Project</span>
            </a>
        </div>
        @endif

        <!-- Pagination -->
        @if($projects->hasPages())
        <div class="mt-12 pt-8 border-t border-neutral-200">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
                <!-- Page Info -->
                <div class="text-sm text-neutral-500 font-light">
                    Showing 
                    <span class="font-medium text-black">{{ $projects->firstItem() }}</span>
                    to 
                    <span class="font-medium text-black">{{ $projects->lastItem() }}</span>
                    of 
                    <span class="font-medium text-black">{{ $projects->total() }}</span>
                    results
                </div>

                <!-- Pagination Links -->
                <div class="flex items-center gap-2">
                    {{-- Previous Button --}}
                    @if ($projects->onFirstPage())
                        <span class="px-4 py-2 border-2 border-neutral-200 text-neutral-400 cursor-not-allowed">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </span>
                    @else
                        <a href="{{ $projects->previousPageUrl() }}" 
                           class="px-4 py-2 border-2 border-black text-black hover:bg-black hover:text-white transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </a>
                    @endif

                    {{-- Page Numbers --}}
                    @foreach ($projects->getUrlRange(1, $projects->lastPage()) as $page => $url)
                        @if ($page == $projects->currentPage())
                            <span class="px-4 py-2 bg-black text-white text-sm font-medium">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" 
                               class="px-4 py-2 border-2 border-neutral-200 text-neutral-600 hover:border-black hover:text-black text-sm font-medium transition-all duration-300">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    {{-- Next Button --}}
                    @if ($projects->hasMorePages())
                        <a href="{{ $projects->nextPageUrl() }}" 
                           class="px-4 py-2 border-2 border-black text-black hover:bg-black hover:text-white transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    @else
                        <span class="px-4 py-2 border-2 border-neutral-200 text-neutral-400 cursor-not-allowed">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection