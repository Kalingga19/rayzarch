@extends('layouts.public')

@section('title', 'About - Rayzarchitecture')

@section('content')
    <div class="grid md:grid-cols-2 gap-8 items-start">
        <div>
            <h1 class="text-2xl sm:text-3xl font-semibold tracking-tight">About</h1>
            <p class="text-sm text-neutral-600 mt-3 leading-relaxed">
                Rayzarchitecture adalah studio desain yang fokus pada arsitektur, interior, dan visualisasi.
                (Ini placeholder — nanti isi dari database About).
            </p>

            <div class="mt-6 rounded-2xl border border-neutral-200 p-5 bg-neutral-50">
                <p class="text-xs tracking-wide text-neutral-500">PROFILE</p>
                <p class="mt-2 font-medium">Rayz</p>
                <p class="text-sm text-neutral-600 mt-1">Architecture & Interior Designer</p>
            </div>

            <div class="mt-6 text-sm tracking-wide">
                <span class="text-neutral-500">MOTTO</span>
                <div class="mt-2 text-lg font-semibold">YOUR VISION, OUR PRECISION</div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-3">
            <div class="aspect-[4/5] rounded-2xl border border-neutral-200 bg-neutral-100"></div>
            <div class="aspect-[4/5] rounded-2xl border border-neutral-200 bg-neutral-100"></div>
            <div class="aspect-[4/5] rounded-2xl border border-neutral-200 bg-neutral-100"></div>
            <div class="aspect-[4/5] rounded-2xl border border-neutral-200 bg-neutral-100"></div>
        </div>
    </div>
@endsection
