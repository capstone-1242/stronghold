<?php

namespace App\Http\Controllers;

use App\Models\TestimonialVideo;
use App\Models\Tag;
use App\Http\Requests\Storetestimonial_videoRequest;
use App\Http\Requests\Updatetestimonial_videoRequest;
use Illuminate\Http\Request;

class TestimonialVideoController extends Controller
{
    /**
     * Display a listing of the testimonial videos.
     */
    public function index(Request $request)
    {
        $tags = Tag::all();
        $selectedTags = $request->get('tags', []);

        $testimonialVideos = TestimonialVideo::when(count($selectedTags) > 0, function ($query) use ($selectedTags) {
            return $query->whereIn('tag_id', $selectedTags);
        })->paginate(6);

        return view('testimonials', compact('tags', 'testimonialVideos', 'selectedTags'));
    }

    /**
     * Show the form for creating a new testimonial video.
     */
    public function create()
    {
        return view('testimonials.create');
    }

    /**
     * Store a newly created testimonial video in storage.
     */
    public function store(Storetestimonial_videoRequest $request)
    {
        $testimonialVideo = TestimonialVideo::create($request->all());
        return redirect()->route('testimonials.show', ['testimonial_video' => $testimonialVideo->id]);
    }

    /**
     * Display the specified testimonial video.
     */
    public function show(TestimonialVideo $testimonial_video)
    {
        return view('testimonials', compact('testimonial_video'));
    }

    /**
     * Show the form for editing the specified testimonial video.
     */
    public function edit(TestimonialVideo $testimonial_video)
    {
        return view('testimonials.edit', compact('testimonial_video'));
    }

    /**
     * Update the specified testimonial video in storage.
     */
    public function update(Updatetestimonial_videoRequest $request, TestimonialVideo $testimonial_video)
    {
        $testimonial_video->update($request->validated());
        return redirect()->route('testimonials');
    }

    /**
     * Remove the specified testimonial video from storage.
     */
    public function destroy(TestimonialVideo $testimonial_video)
    {
        $testimonial_video->delete();
        return redirect()->route('testimonials');
    }
}
