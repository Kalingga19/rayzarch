<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home() { return view('public.home'); }

    public function architecture() {
        $projects = Project::where('category', 'architecture')->latest()->paginate(8);

        return view('public.category', [
            'title' => 'Architecture',
            'subtitle' => 'Arah gaya arsitektur dan referensi.',
            'projects' => $projects,
            'activeCategory' => 'architecture',
        ]);
    }

    public function interior() {
        $projects = Project::where('category', 'interior')->latest()->paginate(8);

        return view('public.category', [
            'title' => 'Interior',
            'subtitle' => 'Konsep interior dan referensi.',
            'projects' => $projects,
            'activeCategory' => 'interior',
        ]);
    }

    public function design() {
        $projects = Project::where('category', 'design')->latest()->paginate(8);

        return view('public.category', [
            'title' => 'Design',
            'subtitle' => 'Portfolio design dengan penjelasan.',
            'projects' => $projects,
            'activeCategory' => 'design',
        ]);
    }

    public function about() { return view('public.about'); }
    public function services() { return view('public.services'); }
    public function contact() { return view('public.contact'); }
}
