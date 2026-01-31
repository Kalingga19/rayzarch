@extends('layouts.public')
@section('title', 'New Project')

@section('content')
<div class="min-h-screen bg-white py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        
        <!-- Header Section -->
        <div class="border-b border-neutral-200 pb-8 mb-10">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl sm:text-5xl font-light tracking-tight text-black mb-3">
                        New Project
                    </h1>
                    <p class="text-base text-neutral-500 font-light">
                        Create a new architecture project entry
                    </p>
                </div>
                <a href="{{ route('admin.projects.index') }}" 
                    class="hidden sm:inline-flex items-center gap-2 text-sm text-neutral-600 hover:text-black transition-colors duration-300 group">
                    <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span class="font-light tracking-wide">Back to Projects</span>
                </a>
            </div>
        </div>

        <!-- Form Section -->
        <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" class="space-y-10">
            @csrf

            <!-- Basic Information -->
            <div class="space-y-8">
                <div class="flex items-center gap-4">
                    <div class="w-1 h-8 bg-black"></div>
                    <h2 class="text-xl font-light tracking-tight text-black">Basic Information</h2>
                </div>

                <!-- Title Field -->
                <div class="group">
                    <label class="block text-xs uppercase tracking-wider text-neutral-900 font-medium mb-3">
                        Project Title *
                    </label>
                    <input 
                        name="title" 
                        required
                        class="w-full border-0 border-b-2 border-neutral-200 px-0 py-3 text-neutral-900 placeholder-neutral-400 bg-transparent focus:outline-none focus:border-black transition-colors duration-300"
                        value="{{ old('title') }}"
                        placeholder="Enter project title">
                    @error('title') 
                        <p class="text-xs text-black mt-2 font-medium">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Year & Category Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <!-- Year Field -->
                    <div class="group">
                        <label class="block text-xs uppercase tracking-wider text-neutral-900 font-medium mb-3">
                            Year
                        </label>
                        <input 
                            name="year" 
                            type="number"
                            class="w-full border-0 border-b-2 border-neutral-200 px-0 py-3 text-neutral-900 placeholder-neutral-400 bg-transparent focus:outline-none focus:border-black transition-colors duration-300"
                            value="{{ old('year') }}"
                            placeholder="2025">
                        @error('year') 
                            <p class="text-xs text-black mt-2 font-medium">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- Category Field -->
                    <div class="group">
                        <label class="block text-xs uppercase tracking-wider text-neutral-900 font-medium mb-3">
                            Category
                        </label>
                        <div class="relative">
                            <select 
                                name="category"
                                class="w-full border-0 border-b-2 border-neutral-200 px-0 py-3 pr-10
                                    text-neutral-900 bg-transparent bg-none
                                    focus:outline-none focus:border-black transition-colors duration-300
                                    appearance-none
                                    [-webkit-appearance:none] [-moz-appearance:none]
                                    cursor-pointer">
                                <option value="architecture" {{ old('category') == 'architecture' ? 'selected' : '' }}>Architecture</option>
                                <option value="interior" {{ old('category') == 'interior' ? 'selected' : '' }}>Interior</option>
                                <option value="design" {{ old('category') == 'design' ? 'selected' : '' }}>Design</option>
                            </select>
                            <svg class="absolute right-0 top-1/2 -translate-y-1/2 w-5 h-5 text-neutral-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                        @error('category') 
                            <p class="text-xs text-black mt-2 font-medium">{{ $message }}</p> 
                        @enderror
                    </div>
                </div>

                <!-- Description Field -->
                <div class="group">
                    <label class="block text-xs uppercase tracking-wider text-neutral-900 font-medium mb-3">
                        Description
                    </label>
                    <textarea 
                        name="description" 
                        rows="6"
                        class="w-full border-0 border-b-2 border-neutral-200 px-0 py-3 text-neutral-900 placeholder-neutral-400 bg-transparent focus:outline-none focus:border-black transition-colors duration-300 resize-none"
                        placeholder="Describe your project...">{{ old('description') }}</textarea>
                    @error('description') 
                        <p class="text-xs text-black mt-2 font-medium">{{ $message }}</p> 
                    @enderror
                </div>
            </div>

            <!-- Media Section -->
            <div class="space-y-8 pt-8 border-t border-neutral-200">
                <div class="flex items-center gap-4">
                    <div class="w-1 h-8 bg-black"></div>
                    <h2 class="text-xl font-light tracking-tight text-black">Media Assets</h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <!-- Cover Image Upload -->
                    <div class="group">
                        <label class="block text-xs uppercase tracking-wider text-neutral-900 font-medium mb-4">
                            Cover Image
                        </label>
                        <div class="relative border-2 border-dashed border-neutral-300 hover:border-black transition-colors duration-300 p-6 text-center">
                            <input 
                                type="file" 
                                name="cover_image" 
                                id="cover_image"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                accept="image/*">
                            <div class="pointer-events-none">
                                <svg class="w-12 h-12 mx-auto mb-3 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <p class="text-sm text-neutral-600 font-light">Click to upload cover</p>
                                <p class="text-xs text-neutral-400 mt-1">PNG, JPG up to 5MB</p>
                            </div>
                        </div>
                        @error('cover_image') 
                            <p class="text-xs text-black mt-2 font-medium">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- Gallery Images Upload -->
                    <div class="group">
                        <label class="block text-xs uppercase tracking-wider text-neutral-900 font-medium mb-4">
                            Gallery Images
                        </label>
                        <div class="relative border-2 border-dashed border-neutral-300 hover:border-black transition-colors duration-300 p-6 text-center">
                            <input 
                                type="file" 
                                name="gallery_images[]" 
                                id="gallery_images"
                                multiple
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                accept="image/*">
                            <div class="pointer-events-none">
                                <svg class="w-12 h-12 mx-auto mb-3 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                </svg>
                                <p class="text-sm text-neutral-600 font-light">Click to upload gallery</p>
                                <p class="text-xs text-neutral-400 mt-1">Multiple files allowed</p>
                            </div>
                        </div>
                        @error('gallery_images') 
                            <p class="text-xs text-black mt-2 font-medium">{{ $message }}</p> 
                        @enderror
                        @error('gallery_images.*') 
                            <p class="text-xs text-black mt-2 font-medium">{{ $message }}</p> 
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 pt-8 border-t border-neutral-200">
                <button 
                    type="submit"
                    class="group relative px-12 py-4 bg-black text-white text-sm uppercase tracking-wider font-medium overflow-hidden transition-all duration-300 hover:bg-neutral-800 flex-1 sm:flex-initial">
                    <span class="relative z-10 flex items-center justify-center gap-2">
                        <span>Create Project</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </span>
                </button>
                
                <a 
                    href="{{ route('admin.projects.index') }}"
                    class="px-12 py-4 bg-white border-2 border-black text-black text-sm uppercase tracking-wider font-medium hover:bg-black hover:text-white transition-all duration-300 text-center">
                    Cancel
                </a>
            </div>
        </form>

        <!-- Mobile Back Button -->
        <div class="sm:hidden mt-8 pt-8 border-t border-neutral-200">
            <a href="{{ route('admin.projects.index') }}" 
                class="flex items-center justify-center gap-2 text-sm text-neutral-600 hover:text-black transition-colors duration-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span class="font-light tracking-wide">Back to Projects</span>
            </a>
        </div>

    </div>
</div>

<!-- File Input Enhancement Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Cover Image Preview
    const coverInput = document.getElementById('cover_image');
    if (coverInput) {
        coverInput.addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            if (fileName) {
                const label = this.parentElement.querySelector('p');
                if (label) label.textContent = fileName;
            }
        });
    }

    // Gallery Images Preview
    const galleryInput = document.getElementById('gallery_images');
    if (galleryInput) {
        galleryInput.addEventListener('change', function(e) {
            const fileCount = e.target.files.length;
            if (fileCount > 0) {
                const label = this.parentElement.querySelector('p');
                if (label) label.textContent = `${fileCount} file(s) selected`;
            }
        });
    }
});
</script>
@endsection