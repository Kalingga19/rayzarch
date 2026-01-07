<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function create()
    {
        return view('feedback.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:120'],
            'email' => ['nullable','email','max:190'],
            'message' => ['required','string','max:2000'],
        ]);

        // sementara belum simpan DB / email
        // nanti kita sambung ke table feedback + kirim email

        return back()->with('success', 'Thanks! Pesan kamu sudah terkirim (dummy).');
    }
}
