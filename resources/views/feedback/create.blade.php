@extends('layouts.public')

@section('title', 'Message - Rayzarchitecture')

@section('content')
    <div class="min-h-screen bg-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <!-- Header Section -->
            <div class="border-b border-neutral-200 pb-8 mb-10">
                <h1 class="text-4xl sm:text-5xl font-light tracking-tight text-black mb-3">
                    Leave a note
                </h1>
                <p class="text-base text-neutral-500 font-light">
                    Kritik / saran / pesan (minimal form).
                </p>
            </div>

            <!-- Form Section -->
            <form method="POST" action="{{ route('feedback.store') }}" class="space-y-8">
                @csrf

                <!-- Name Field -->
                <div class="group">
                    <label class="block text-xs uppercase tracking-wider text-neutral-900 font-medium mb-3">
                        Name
                    </label>
                    <input 
                        name="name" 
                        required
                        class="w-full border-0 border-b-2 border-neutral-200 px-0 py-3 text-neutral-900 placeholder-neutral-400 bg-transparent focus:outline-none focus:border-black transition-colors duration-300"
                        value="{{ old('name') }}"
                        placeholder="Your name">
                    @error('name') 
                        <p class="text-xs text-black mt-2 font-medium">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="group">
                    <label class="block text-xs uppercase tracking-wider text-neutral-900 font-medium mb-3">
                        Email <span class="text-neutral-400 normal-case">(optional)</span>
                    </label>
                    <input 
                        name="email" 
                        type="email"
                        class="w-full border-0 border-b-2 border-neutral-200 px-0 py-3 text-neutral-900 placeholder-neutral-400 bg-transparent focus:outline-none focus:border-black transition-colors duration-300"
                        value="{{ old('email') }}"
                        placeholder="your@email.com">
                    @error('email') 
                        <p class="text-xs text-black mt-2 font-medium">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Message Field -->
                <div class="group">
                    <label class="block text-xs uppercase tracking-wider text-neutral-900 font-medium mb-3">
                        Message
                    </label>
                    <textarea 
                        name="message" 
                        rows="6" 
                        required
                        class="w-full border-0 border-b-2 border-neutral-200 px-0 py-3 text-neutral-900 placeholder-neutral-400 bg-transparent focus:outline-none focus:border-black transition-colors duration-300 resize-none"
                        placeholder="Write your message here...">{{ old('message') }}</textarea>
                    @error('message') 
                        <p class="text-xs text-black mt-2 font-medium">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-6">
                    <button 
                        type="submit"
                        class="group relative w-full sm:w-auto px-12 py-4 bg-black text-white text-sm uppercase tracking-wider font-medium overflow-hidden transition-all duration-300 hover:bg-neutral-800">
                        <span class="relative z-10">Send Message</span>
                        <div class="absolute inset-0 bg-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                        <span class="absolute inset-0 flex items-center justify-center text-black opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-20">
                            Send Message
                        </span>
                    </button>
                </div>
            </form>

            <!-- Footer Note -->
            <div class="mt-16 pt-8 border-t border-neutral-200">
                <p class="text-xs text-neutral-400 tracking-wide">
                    We appreciate your feedback and will review it carefully.
                </p>
            </div>
        </div>
    </div>
@endsection