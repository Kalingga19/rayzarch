@extends('layouts.public')

@section('title', 'Services - Rayzarchitecture')

@section('content')
    <h1 class="text-2xl sm:text-3xl font-semibold tracking-tight">Services</h1>
    <p class="text-sm text-neutral-600 mt-2">Jasa desain & visualisasi (placeholder).</p>

    <div class="mt-6 grid sm:grid-cols-2 gap-4">
        @foreach([
            '3D Rendering',
            'Floor Plan / Denah',
            'Interior Layout',
            'Facade / Exterior Concept',
        ] as $svc)
            <div class="rounded-2xl border border-neutral-200 p-5">
                <p class="font-medium">{{ $svc }}</p>
                <p class="text-sm text-neutral-600 mt-2">Deskripsi singkat layanan.</p>
            </div>
        @endforeach
    </div>

    <a class="inline-flex mt-8 px-5 py-3 rounded-2xl bg-neutral-900 text-white hover:bg-neutral-800 transition"
       href="mailto:rayzarchitecture1908@gmail.com">
        Request service via email
    </a>
@endsection
