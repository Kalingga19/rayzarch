@extends('layouts.public')

@section('title', 'Home - Rayzarchitecture')

@section('content')
    <div class="flex items-end justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl sm:text-3xl font-semibold tracking-tight">Portfolio</h1>
            <p class="text-sm text-neutral-500 mt-1">Minimal preview grid (dummy). Nanti diganti data dari tabel Projects.</p>
        </div>
        <a href="{{ route('projects.index') }}"
           class="text-sm px-4 py-2 rounded-2xl border border-neutral-200 hover:bg-neutral-50 transition">
            Lihat semua projects
        </a>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
        @for($i=1; $i<=12; $i++)
            <a href="{{ route('projects.index') }}"
               class="group relative aspect-[4/5] rounded-2xl overflow-hidden border border-neutral-200 bg-neutral-100">
                <div class="absolute inset-0 bg-gradient-to-t from-black/45 to-transparent opacity-0 group-hover:opacity-100 transition"></div>
                <div class="absolute bottom-0 left-0 right-0 p-3 opacity-0 group-hover:opacity-100 transition text-white">
                    <p class="text-xs tracking-wide">PROJECT {{ $i }}</p>
                    <p class="text-sm font-medium">Preview</p>
                </div>
            </a>
        @endfor
    </div>
@endsection
