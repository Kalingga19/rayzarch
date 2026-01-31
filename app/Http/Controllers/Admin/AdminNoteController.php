<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminNoteController extends Controller
{
    public function index()
    {
        $notes = Note::latest()->paginate(12);
        return view('admin.notes.index', compact('notes'));
    }

    public function create()
    {
        return view('admin.notes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'in:sketch,layout,experiment,reference,other'],
            'content' => ['nullable', 'string', 'max:8000'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'max:5120'], // 5MB per image
        ]);

        $paths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $paths[] = $img->store('notes', 'public');
            }
        }

        $data['images'] = $paths ?: null;

        Note::create($data);

        return redirect()->route('admin.notes.index')->with('success', 'Note created.');
    }

    public function destroy(Note $note)
    {
        if (is_array($note->images)) {
            Storage::disk('public')->delete($note->images);
        }

        $note->delete();

        return back()->with('success', 'Note deleted.');
    }
}
