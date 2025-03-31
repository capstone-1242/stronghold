<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\TestimonialVideo;
use App\Models\Video;

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
        })->limit(4)->get();

        $presenterVideos = Video::with('author')
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();

        return view('home', compact('tags', 'testimonialVideos', 'selectedTags', 'presenterVideos'));
    }
}