@extends('layouts.public')

@section('title', 'Media - Rayzarchitecture')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl sm:text-3xl font-semibold tracking-tight">Media</h1>
        <p class="text-sm text-neutral-500 mt-1">Upload sketsa / layout / eksperimen (placeholder).</p>
    </div>

    <div class="flex gap-2 mb-5 text-xs">
        <span class="px-3 py-1 rounded-full border border-neutral-200">All</span>
        <span class="px-3 py-1 rounded-full border border-neutral-200">Sketch</span>
        <span class="px-3 py-1 rounded-full border border-neutral-200">Layout</span>
        <span class="px-3 py-1 rounded-full border border-neutral-200">Experiment</span>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
        @for($i=1; $i<=12; $i++)
            <div class="rounded-2xl border border-neutral-200 overflow-hidden">
                <div class="aspect-[4/5] bg-neutral-100"></div>
                <div class="p-3">
                    <p class="text-xs text-neutral-500">Category</p>
                    <p class="text-sm font-medium">Note {{ $i }}</p>
                </div>
            </div>
        @endfor
    </div>
@endsection
