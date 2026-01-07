@extends('layouts.public')

@section('title', 'Message - Rayzarchitecture')

@section('content')
    <h1 class="text-2xl sm:text-3xl font-semibold tracking-tight">Leave a note</h1>
    <p class="text-sm text-neutral-600 mt-2">Kritik / saran / pesan (minimal form).</p>

    <form method="POST" action="{{ route('feedback.store') }}" class="mt-6 max-w-xl space-y-4">
        @csrf

        <div>
            <label class="text-sm text-neutral-600">Name</label>
            <input name="name" required
                   class="mt-1 w-full rounded-2xl border border-neutral-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-neutral-300"
                   value="{{ old('name') }}">
            @error('name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="text-sm text-neutral-600">Email (optional)</label>
            <input name="email" type="email"
                   class="mt-1 w-full rounded-2xl border border-neutral-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-neutral-300"
                   value="{{ old('email') }}">
            @error('email') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="text-sm text-neutral-600">Message</label>
            <textarea name="message" rows="5" required
                      class="mt-1 w-full rounded-2xl border border-neutral-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-neutral-300">{{ old('message') }}</textarea>
            @error('message') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <button class="px-5 py-3 rounded-2xl bg-neutral-900 text-white hover:bg-neutral-800 transition">
            Send
        </button>
    </form>
@endsection
