@extends('layouts.public')

@section('title', 'Projects - Rayzarchitecture')

@section('content')
    <div class="flex items-end justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl sm:text-3xl font-semibold tracking-tight">Projects</h1>
            <p class="text-sm text-neutral-500 mt-1">Ini versi minimal. Nanti diisi dari DB + pagination.</p>
        </div>
        <a href="{{ route('services') }}"
           class="text-sm px-4 py-2 rounded-2xl border border-neutral-200 hover:bg-neutral-50 transition">
            Services
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @for($i=1; $i<=9; $i++)
            <a href="{{ route('projects.index') }}"
               class="rounded-2xl border border-neutral-200 overflow-hidden hover:shadow-sm transition">
                <div class="aspect-[16/10] bg-neutral-100"></div>
                <div class="p-4">
                    <p class="text-xs tracking-wide text-neutral-500">2026 • DESIGN</p>
                    <h3 class="mt-1 font-medium">Project {{ $i }}</h3>
                    <p class="text-sm text-neutral-600 mt-1 line-clamp-2">Deskripsi singkat project (placeholder).</p>
                </div>
            </a>
        @endfor
    </div>
@endsection
