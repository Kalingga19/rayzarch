@extends('layouts.public') 

@section('content')
<div class="py-10">
  <div class="max-w-6xl mx-auto px-6">
    <div class="mb-10">
      <h1 class="text-3xl font-light tracking-tight">Admin Dashboard</h1>
      <p class="mt-2 text-sm text-gray-500 font-light">Choose what you want to manage.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      {{-- Projects --}}
      <a href="{{ route('admin.projects.index') }}"
         class="group border border-gray-300 p-8 hover:border-black transition-all duration-300 bg-white">
        <div class="flex items-start justify-between">
          <div>
            <p class="text-xs tracking-[0.2em] text-gray-500">PROJECTS</p>
            <h2 class="mt-3 text-xl font-light text-black group-hover:text-gray-700 transition-colors">
              Manage Projects
            </h2>
            <p class="mt-2 text-sm text-gray-600 font-light">
              Create, edit, gallery, and publish projects.
            </p>
          </div>

          <svg class="w-5 h-5 text-gray-400 group-hover:text-black transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </div>

        <div class="mt-6 inline-flex items-center gap-2 text-xs tracking-[0.2em] text-black opacity-80 group-hover:opacity-100">
          <span>OPEN</span>
        </div>
      </a>

      {{-- Notes --}}
      <a href="{{ route('admin.notes.index') }}"
         class="group border border-gray-300 p-8 hover:border-black transition-all duration-300 bg-white">
        <div class="flex items-start justify-between">
          <div>
            <p class="text-xs tracking-[0.2em] text-gray-500">MEDIA / NOTES</p>
            <h2 class="mt-3 text-xl font-light text-black group-hover:text-gray-700 transition-colors">
              Manage Notes
            </h2>
            <p class="mt-2 text-sm text-gray-600 font-light">
              Upload sketches, layouts, experiments (multiple images).
            </p>
          </div>

          <svg class="w-5 h-5 text-gray-400 group-hover:text-black transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </div>

        <div class="mt-6 inline-flex items-center gap-2 text-xs tracking-[0.2em] text-black opacity-80 group-hover:opacity-100">
          <span>OPEN</span>
        </div>
      </a>
    </div>
  </div>
</div>
@endsection
