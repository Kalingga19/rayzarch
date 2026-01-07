<?php

namespace App\Http\Controllers;

class NoteController extends Controller
{
    public function index()
    {
        return view('notes.index');
    }
}
