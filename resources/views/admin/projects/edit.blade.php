@extends('layouts.public')
@section('title', 'Edit Project')

@section('content')
<h1 class="text-2xl font-semibold">Edit Project</h1>
<p class="text-sm text-neutral-500 mt-1">Slug: <span class="font-mono">/{{ $project->slug }}</span></p>

<form class="mt-6 max-w-2xl space-y-4" method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data">
  @csrf @method('PUT')

  <div>
    <label class="text-sm text-neutral-600">Title</label>
    <input name="title" required class="mt-1 w-full rounded-2xl border border-neutral-200 px-4 py-3" value="{{ old('title', $project->title) }}">
  </div>

  <div class="grid grid-cols-2 gap-3">
    <div>
      <label class="text-sm text-neutral-600">Year</label>
      <input name="year" type="number" class="mt-1 w-full rounded-2xl border border-neutral-200 px-4 py-3" value="{{ old('year', $project->year) }}">
    </div>
    <div>
      <label class="text-sm text-neutral-600">Category</label>
      <select name="category" class="mt-1 w-full rounded-2xl border border-neutral-200 px-4 py-3">
        @foreach(['architecture','interior','design'] as $c)
          <option value="{{ $c }}" @selected(old('category', $project->category) === $c)>{{ $c }}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div>
    <label class="text-sm text-neutral-600">Description</label>
    <textarea name="description" rows="5" class="mt-1 w-full rounded-2xl border border-neutral-200 px-4 py-3">{{ old('description', $project->description) }}</textarea>
  </div>

  <div class="grid sm:grid-cols-2 gap-4">
    <div>
      <label class="text-sm text-neutral-600">Replace Cover Image</label>
      <input type="file" name="cover_image" class="mt-2 block w-full">
      @if($project->cover_image)
        <img class="mt-3 w-full max-w-sm rounded-2xl border border-neutral-200"
             src="{{ asset('storage/'.$project->cover_image) }}" alt="Cover">
      @endif
    </div>

    <div>
      <label class="text-sm text-neutral-600">Add Gallery Images (multiple)</label>
      <input type="file" name="gallery_images[]" multiple class="mt-2 block w-full">
      <p class="text-xs text-neutral-500 mt-2">Upload di sini akan ditambahkan ke gallery (bukan replace).</p>
    </div>
  </div>

  @if(is_array($project->gallery) && count($project->gallery))
    <div>
      <p class="text-sm text-neutral-600 mb-2">Current Gallery</p>
      <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
        @foreach($project->gallery as $path)
          <div class="rounded-2xl border border-neutral-200 overflow-hidden">
            <img class="w-full aspect-[4/5] object-cover" src="{{ asset('storage/'.$path) }}" alt="Gallery image" loading="lazy">
            <form method="POST" action="{{ route('admin.projects.gallery-delete', $project) }}" onsubmit="return confirm('Remove this image?')" class="p-2">
              @csrf
              <input type="hidden" name="path" value="{{ $path }}">
              <button class="w-full px-3 py-2 rounded-xl border border-neutral-200 text-sm">Remove</button>
            </form>
          </div>
        @endforeach
      </div>
    </div>
  @endif

  <div class="flex gap-2">
    <button class="px-5 py-3 rounded-2xl bg-neutral-900 text-white">Update</button>
    <a href="{{ route('admin.projects.index') }}" class="px-5 py-3 rounded-2xl border border-neutral-200">Back</a>
  </div>
</form>
@endsection
