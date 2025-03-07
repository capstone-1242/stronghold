<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\TestimonialVideo;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tags = Tag::all();
        $selectedTags = $request->get('tags', []);

        $testimonialVideos = TestimonialVideo::when(count($selectedTags) > 0, function ($query) use ($selectedTags) {
            return $query->whereIn('tag_id', $selectedTags);
        })->limit(3)->get();

        return view('home', compact('tags', 'testimonialVideos', 'selectedTags'));
    }
}
