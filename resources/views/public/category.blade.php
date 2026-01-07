@extends('layouts.public')

@section('title', $title . ' - Rayzarchitecture')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl sm:text-3xl font-semibold tracking-tight">{{ $title }}</h1>
        <p class="text-sm text-neutral-500 mt-2">
            {{ $subtitle }}
        </p>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
        @for($i=1; $i<=8; $i++)
            <div class="aspect-[4/5] rounded-2xl border border-neutral-200 bg-neutral-100"></div>
        @endfor
    </div>
@endsection
