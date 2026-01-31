@extends('layouts.public')

@section('title', 'Create Note')

@section('content')
<div class="min-h-screen bg-white py-16 px-6 sm:px-8 lg:px-12">
    <div class="max-w-3xl mx-auto">

        <!-- Header Section -->
        <div class="mb-16 space-y-4">
            <div class="flex items-center gap-6">
                <a href="{{ route('admin.notes.index') }}"
                   class="group flex items-center justify-center w-10 h-10 border border-gray-300 hover:border-black transition-colors duration-300">
                    <svg class="w-4 h-4 text-gray-500 group-hover:text-black transition-colors duration-300"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <div class="inline-block">
                    <h1 class="text-4xl sm:text-5xl font-light tracking-tight text-black">
                        Create Note
                    </h1>
                    <div class="h-px bg-black mt-4 w-20"></div>
                </div>
            </div>
            <p class="text-base text-gray-600 font-light tracking-wide pl-16">
                Fill in the details below to create a new note.
            </p>
        </div>

        <!-- Error Message -->
        @if ($errors->any())
            <div class="mb-10 border-l-2 border-red-600 bg-red-50 p-5">
                <div class="flex items-start gap-4">
                    <div class="w-6 h-6 border border-red-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-3 h-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs tracking-[0.15em] text-red-600 mb-2">VALIDATION ERROR</p>
                        <ul class="space-y-1">
                            @foreach ($errors->all() as $error)
                                <li class="text-sm text-red-700 font-light flex items-start gap-2">
                                    <span class="text-red-400 mt-1">—</span>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('admin.notes.store') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
            @csrf

            <!-- Title Field -->
            <div class="space-y-3">
                <label class="block text-xs tracking-[0.2em] text-gray-500">TITLE <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full border-b-2 border-gray-300 py-3 bg-transparent text-base font-light text-black placeholder-gray-400 focus:outline-none focus:border-black transition-colors duration-300"
                        placeholder="Enter note title"
                        required>
                </div>
                @error('title')
                    <p class="text-[11px] text-red-600 font-light tracking-wide">{{ $message }}</p>
                @endError
            </div>

            <!-- Category Field -->
            <div class="space-y-3">
                <label class="block text-xs tracking-[0.2em] text-gray-500">CATEGORY</label>
                <div class="relative">
                    <select name="category"
                            class="w-full border-b-2 border-gray-300 py-3 pr-10 bg-transparent text-base font-light text-black focus:outline-none focus:border-black
                                   appearance-none [-webkit-appearance:none] [-moz-appearance:none] [background-image:none] cursor-pointer transition-colors duration-300">
                        <option value="">Select a category</option>
                        @foreach(['sketch','layout','experiment','reference','other'] as $cat)
                            <option value="{{ $cat }}" @selected(old('category') === $cat)>{{ strtoupper($cat) }}</option>
                        @endforeach
                    </select>
                    <svg class="absolute right-0 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
                @error('category')
                    <p class="text-[11px] text-red-600 font-light tracking-wide">{{ $message }}</p>
                @endError
            </div>

            <!-- Divider -->
            <div class="border-t border-gray-200"></div>

            <!-- Content Field -->
            <div class="space-y-3">
                <label class="block text-xs tracking-[0.2em] text-gray-500">CONTENT <span class="text-gray-400">(OPTIONAL)</span></label>
                <textarea name="content" rows="6"
                          class="w-full border border-gray-300 p-4 bg-white text-sm font-light text-black placeholder-gray-400 focus:outline-none focus:border-black transition-colors duration-300 resize-none"
                          placeholder="Write your content here...">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-[11px] text-red-600 font-light tracking-wide">{{ $message }}</p>
                @endError
            </div>

            <!-- Images Upload Field -->
            <div class="space-y-3">
            <label class="block text-xs tracking-[0.2em] text-gray-500">
                IMAGES <span class="text-gray-400">(MULTIPLE)</span>
            </label>

            <label class="relative block border-2 border-dashed border-gray-300 hover:border-black transition-colors duration-300 p-8 cursor-pointer">
                <div class="text-center space-y-3 pointer-events-none">
                <div class="w-12 h-12 border border-gray-300 mx-auto flex items-center justify-center">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-light text-gray-600">Drop your images here</p>
                    <p class="text-xs text-gray-400 mt-1">or click to browse</p>
                </div>
                </div>

                <input
                type="file"
                name="images[]"
                multiple
                accept="image/*"
                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                />
            </label>

            <p class="text-[11px] text-gray-400 tracking-wide">
                Max 5MB per image. Supported formats: JPG, PNG, WEBP
            </p>

            @error('images')
                <p class="text-[11px] text-red-600 font-light tracking-wide">{{ $message }}</p>
            @endError

            <script>
                const input = document.querySelector('input[name="images[]"]');
                const status = document.getElementById('image-status');

                if (input) {
                    input.addEventListener('change', function () {
                    const count = this.files.length;

                    if (count === 0) {
                        status.textContent = 'No images selected';
                        status.classList.remove('text-black');
                        status.classList.add('text-gray-500');
                    } else if (count === 1) {
                        status.textContent = '1 image selected';
                        status.classList.remove('text-gray-500');
                        status.classList.add('text-black');
                    } else {
                        status.textContent = count + ' images selected';
                        status.classList.remove('text-gray-500');
                        status.classList.add('text-black');
                    }
                    });
                }
            </script>

            </div>

            <!-- Divider -->
            <div class="border-t border-gray-200"></div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-between pt-4">
                <a href="{{ route('admin.notes.index') }}"
                   class="group inline-flex items-center gap-2 text-xs tracking-[0.2em] text-gray-500 hover:text-black transition-colors duration-300">
                    <svg class="w-3.5 h-3.5 transform group-hover:-translate-x-1 transition-transform duration-300"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    CANCEL
                </a>

                <button type="submit"
                        class="group inline-flex items-center justify-center px-10 py-4 border-2 border-black bg-black text-white hover:bg-white hover:text-black transition-all duration-300">
                    <span class="text-xs tracking-[0.2em] font-light">SAVE NOTE</span>
                    <svg class="w-4 h-4 ml-3 transform group-hover:translate-x-1 transition-transform duration-300"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </button>
            </div>
        </form>

    </div>
</div>
@endsection

