@extends('layouts.public')

@section('title', 'Admin Projects')

@section('content')
<h1 class="text-2xl font-semibold">Admin • Projects</h1>

<div class="mt-4 flex justify-between">
  <a href="{{ route('admin.projects.create') }}" class="px-4 py-2 rounded-2xl bg-neutral-900 text-white">New Project</a>
  <a href="{{ route('home') }}" class="px-4 py-2 rounded-2xl border border-neutral-200">Back to site</a>
</div>

<div class="mt-6 space-y-3">
  @foreach($projects as $p)
    <div class="rounded-2xl border border-neutral-200 p-4 flex items-center justify-between gap-4">
      <div class="min-w-0">
        <div class="text-xs text-neutral-500">{{ $p->year }} • {{ strtoupper($p->category) }}</div>
        <div class="font-medium truncate">{{ $p->title }}</div>
        <div class="text-xs text-neutral-500 truncate">/{{ $p->slug }}</div>
      </div>
      <div class="flex gap-2 shrink-0">
        <a class="px-3 py-2 rounded-xl border border-neutral-200" href="{{ route('admin.projects.edit', $p) }}">Edit</a>
        <form method="POST" action="{{ route('admin.projects.destroy', $p) }}" onsubmit="return confirm('Delete project?')">
          @csrf @method('DELETE')
          <button class="px-3 py-2 rounded-xl border border-neutral-200">Delete</button>
        </form>
      </div>
    </div>
  @endforeach
</div>

<div class="mt-6">{{ $projects->links() }}</div>
@endsection
