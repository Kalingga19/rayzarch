<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home() { return view('public.home'); }

    public function architecture() {
        return view('public.category', [
            'title' => 'Architecture',
            'subtitle' => 'Arah gaya arsitektur dan referensi (placeholder).'
        ]);
    }

    public function interior() {
        return view('public.category', [
            'title' => 'Interior',
            'subtitle' => 'Konsep interior dan referensi (placeholder).'
        ]);
    }

    public function design() {
        return view('public.category', [
            'title' => 'Design',
            'subtitle' => 'Portfolio design dengan penjelasan (placeholder).'
        ]);
    }

    public function about() { return view('public.about'); }

    public function services() { return view('public.services'); }

    public function contact() { return view('public.contact'); }
}
