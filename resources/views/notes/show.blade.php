@extends('layouts.public')

@section('title', ($note->title ?? 'Note') . ' - Rayzarchitecture')

@section('content')
<div class="min-h-screen bg-white py-16 px-6 sm:px-8 lg:px-12">
  <div class="max-w-6xl mx-auto">

    {{-- Top nav --}}
    <div class="mb-10 flex items-center justify-between gap-6">
      <a href="{{ route('notes.index') }}"
         class="text-xs tracking-[0.2em] text-gray-500 hover:text-black transition-colors">
        ← BACK TO MEDIA
      </a>

      <div class="text-[10px] tracking-[0.2em] text-gray-400 uppercase">
        {{ strtoupper($note->category ?? 'NOTE') }}
        <span class="mx-2">•</span>
        {{ $note->created_at?->format('d M Y') }}
      </div>
    </div>

    {{-- Header --}}
    <div class="mb-10 space-y-4">
      <h1 class="text-3xl sm:text-4xl lg:text-5xl font-light tracking-tight text-black">
        {{ $note->title ?? 'Untitled Note' }}
      </h1>

      @if($note->content)
        <p class="text-base sm:text-lg text-gray-700 font-light leading-relaxed max-w-3xl">
          {{ $note->content }}
        </p>
      @endif
    </div>

    {{-- Images --}}
    @php
      $images = is_array($note->images) ? $note->images : [];
    @endphp

    @if(count($images) === 0)
      <div class="border border-gray-300 p-10 text-center text-gray-600 font-light">
        No images uploaded yet.
      </div>
    @else
      {{-- Main hero image (first) --}}
      <button type="button"
              class="group w-full border border-gray-300 overflow-hidden bg-gray-50 text-left"
              onclick="openLightbox(0)">
        <div class="relative aspect-[16/9]">
          <img src="{{ asset('storage/' . $images[0]) }}"
               alt="Note image"
               class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" />
          <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>

          <div class="absolute bottom-4 right-4 px-4 py-2 border border-white bg-black/50 backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <span class="text-white text-[10px] tracking-[0.2em]">OPEN</span>
          </div>
        </div>
      </button>

      {{-- Gallery thumbnails --}}
      @if(count($images) > 1)
        <div class="mt-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
          @foreach($images as $idx => $img)
            @continue($idx === 0)
            <button type="button"
                    class="group border border-gray-300 bg-gray-50 overflow-hidden hover:border-black transition-all duration-300"
                    onclick="openLightbox({{ $idx }})">
              <div class="relative aspect-[4/5]">
                <img src="{{ asset('storage/' . $img) }}"
                     alt="Gallery image"
                     class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out" />
                <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
              </div>
            </button>
          @endforeach
        </div>
      @endif
    @endif

  </div>
</div>

{{-- Lightbox --}}
<div id="lightbox"
     class="fixed inset-0 z-50 hidden items-center justify-center bg-black/80 p-4">
  <div class="relative w-full max-w-5xl">
    <button type="button"
            class="absolute -top-10 right-0 text-white/80 hover:text-white text-xs tracking-[0.2em]"
            onclick="closeLightbox()">
      CLOSE ✕
    </button>

    <div class="relative border border-white/20 bg-black">
      <img id="lightbox-img" src="" alt="Lightbox"
           class="w-full max-h-[80vh] object-contain bg-black" />

      {{-- Prev/Next --}}
      <button type="button"
              class="absolute left-0 top-0 h-full px-4 text-white/70 hover:text-white"
              onclick="prevLightbox()"
              aria-label="Previous">
        ‹
      </button>
      <button type="button"
              class="absolute right-0 top-0 h-full px-4 text-white/70 hover:text-white"
              onclick="nextLightbox()"
              aria-label="Next">
        ›
      </button>

      <div class="absolute bottom-3 left-1/2 -translate-x-1/2 text-[10px] tracking-[0.2em] text-white/70">
        <span id="lightbox-count"></span>
      </div>
    </div>
  </div>
</div>

<script>
  const images = @json($images);
  let currentIndex = 0;

  function openLightbox(index) {
    if (!images.length) return;
    currentIndex = index;
    const lb = document.getElementById('lightbox');
    lb.classList.remove('hidden');
    lb.classList.add('flex');
    renderLightbox();
    document.body.style.overflow = 'hidden';
  }

  function closeLightbox() {
    const lb = document.getElementById('lightbox');
    lb.classList.add('hidden');
    lb.classList.remove('flex');
    document.body.style.overflow = '';
  }

  function renderLightbox() {
    const img = document.getElementById('lightbox-img');
    const count = document.getElementById('lightbox-count');
    img.src = "{{ asset('storage') }}/" + images[currentIndex];
    count.textContent = (currentIndex + 1) + " / " + images.length;
  }

  function prevLightbox() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    renderLightbox();
  }

  function nextLightbox() {
    currentIndex = (currentIndex + 1) % images.length;
    renderLightbox();
  }

  // Close on ESC and click outside
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowLeft') prevLightbox();
    if (e.key === 'ArrowRight') nextLightbox();
  });

  document.getElementById('lightbox')?.addEventListener('click', (e) => {
    if (e.target.id === 'lightbox') closeLightbox();
  });
</script>
@endsection
