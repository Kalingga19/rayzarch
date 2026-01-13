<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(12);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:190'],
            'year' => ['nullable','integer','min:1900','max:2100'],
            'category' => ['required','in:architecture,interior,design'],
            'description' => ['nullable','string','max:5000'],

            'cover_image' => ['nullable','image','max:5120'], // 5MB
            'gallery_images' => ['nullable','array'],
            'gallery_images.*' => ['image','max:5120'],
        ]);

        $slugBase = Str::slug($data['title']);
        $data['slug'] = $slugBase . '-' . Str::random(6);

        // cover
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('projects/covers', 'public');
        }

        // gallery
        $galleryPaths = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $img) {
                $galleryPaths[] = $img->store('projects/gallery', 'public');
            }
        }
        $data['gallery'] = $galleryPaths ?: null;

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project created.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => ['required','string','max:190'],
            'year' => ['nullable','integer','min:1900','max:2100'],
            'category' => ['required','in:architecture,interior,design'],
            'description' => ['nullable','string','max:5000'],

            'cover_image' => ['nullable','image','max:5120'],
            'gallery_images' => ['nullable','array'],
            'gallery_images.*' => ['image','max:5120'],
        ]);

        // kalau title berubah, slug biarkan tetap (biar link tidak berubah).
        // kalau kamu mau slug ikut berubah, bilang nanti aku adjust.

        // replace cover if uploaded
        if ($request->hasFile('cover_image')) {
            if ($project->cover_image) {
                Storage::disk('public')->delete($project->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('projects/covers', 'public');
        }

        // append new gallery images
        $gallery = $project->gallery ?? [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $img) {
                $gallery[] = $img->store('projects/gallery', 'public');
            }
        }
        $data['gallery'] = $gallery ?: null;

        $project->update($data);

        return redirect()->route('admin.projects.edit', $project)->with('success', 'Project updated.');
    }

    public function destroy(Project $project)
    {
        // delete files
        if ($project->cover_image) {
            Storage::disk('public')->delete($project->cover_image);
        }
        if (is_array($project->gallery)) {
            Storage::disk('public')->delete($project->gallery);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted.');
    }

    public function show(Project $project)
    {
        return redirect()->route('admin.projects.edit', $project);
    }

    // OPTIONAL: delete 1 image from gallery
    public function deleteGalleryImage(Request $request, Project $project)
    {
        $request->validate([
            'path' => ['required','string'],
        ]);

        $path = $request->input('path');
        $gallery = $project->gallery ?? [];

        $gallery = array_values(array_filter($gallery, fn($p) => $p !== $path));

        Storage::disk('public')->delete($path);

        $project->update([
            'gallery' => $gallery ?: null,
        ]);

        return back()->with('success', 'Gallery image removed.');
    }
}
