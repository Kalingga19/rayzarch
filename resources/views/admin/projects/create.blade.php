@extends('layouts.public')
@section('title', 'New Project')

@section('content')
<h1 class="text-2xl font-semibold">New Project</h1>

<form class="mt-6 max-w-2xl space-y-4" method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
  @csrf

  <div>
    <label class="text-sm text-neutral-600">Title</label>
    <input name="title" required class="mt-1 w-full rounded-2xl border border-neutral-200 px-4 py-3" value="{{ old('title') }}">
    @error('title') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
  </div>

  <div class="grid grid-cols-2 gap-3">
    <div>
      <label class="text-sm text-neutral-600">Year</label>
      <input name="year" type="number" class="mt-1 w-full rounded-2xl border border-neutral-200 px-4 py-3" value="{{ old('year') }}">
      @error('year') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
      <label class="text-sm text-neutral-600">Category</label>
      <select name="category" class="mt-1 w-full rounded-2xl border border-neutral-200 px-4 py-3">
        <option value="architecture">architecture</option>
        <option value="interior">interior</option>
        <option value="design">design</option>
      </select>
      @error('category') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>
  </div>

  <div>
    <label class="text-sm text-neutral-600">Description</label>
    <textarea name="description" rows="5" class="mt-1 w-full rounded-2xl border border-neutral-200 px-4 py-3">{{ old('description') }}</textarea>
    @error('description') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
  </div>

  <div class="grid sm:grid-cols-2 gap-4">
    <div>
      <label class="text-sm text-neutral-600">Cover Image</label>
      <input type="file" name="cover_image" class="mt-2 block w-full">
      @error('cover_image') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="text-sm text-neutral-600">Gallery Images (multiple)</label>
      <input type="file" name="gallery_images[]" multiple class="mt-2 block w-full">
      @error('gallery_images') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
      @error('gallery_images.*') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>
  </div>

  <div class="flex gap-2">
    <button class="px-5 py-3 rounded-2xl bg-neutral-900 text-white">Save</button>
    <a href="{{ route('admin.projects.index') }}" class="px-5 py-3 rounded-2xl border border-neutral-200">Cancel</a>
  </div>
</form>
@endsection
