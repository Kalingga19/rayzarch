<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');

        $query = Note::query()->latest();

        if ($category) {
            $query->where('category', $category);
        }

        $notes = $query->paginate(12)->withQueryString();

        return view('notes.index', compact('notes', 'category'));
    }

    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }
}
