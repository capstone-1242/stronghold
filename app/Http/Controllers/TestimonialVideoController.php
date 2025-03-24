<?php

namespace App\Http\Controllers;

use App\Models\TestimonialVideo;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
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
     * Display a listing of the testimonial videos in the database.
     */
    public function authTestimonials(Request $request)
    {
        $testimonialVideos = TestimonialVideo::paginate(8);

        return view('auth.auth-testimonials', compact('testimonialVideos'));
    }

    /**
     * Show the form for creating a new testimonial video.
     */
    public function create()
    {
        return view('auth.create.testimonial');
    }

    /**
     * Store a newly created testimonial video in the database.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'url' => ['required', 'url'],
            'tag_id' => ['required', 'exists:tags,id'],
        ], [
            'title.required' => 'The title is required.',
            'title.max' => 'The title cannot exceed 255 characters.',
            
            'url.required' => 'The URL is required.',
            'url.url' => 'Please provide a valid URL.',
            
            'tag_id.required' => 'The tag is required.',
            'tag_id.exists' => 'The selected tag is invalid.',
        ]);

        TestimonialVideo::create([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'tag_id' => $request->tag_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('auth.create.testimonial')->with('success', 'Testimonial created successfully!');
    }

    /**
     * Show the form for editing the specified testimonial video.
     */
    public function edit(Request $request)
    {
        $testimonial_video = null;
        if ($request->has('testimonial_video_id')) {
            $testimonial_video = TestimonialVideo::find($request->testimonial_video_id);
        }

        $testimonialVideos = TestimonialVideo::all();
        $tags = Tag::all();

        return view('auth.edit.testimonial', compact('testimonial_video', 'testimonialVideos', 'tags'));
    }

    /**
     * Update the specified testimonial video in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'url' => ['required', 'url'],
            'tag_id' => ['required', 'exists:tags,id'], 
        ], [
            'title.required' => 'The title is required.',
            'title.max' => 'The title cannot exceed 255 characters.',
            
            'url.required' => 'The URL is required.',
            'url.url' => 'Please provide a valid URL.',
            
            'tag_id.required' => 'The tag is required.',
            'tag_id.exists' => 'The selected tag is invalid.',
        ]);

        $testimonial_video = TestimonialVideo::findOrFail($id);

        $testimonial_video->update([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'tag_id' => $request->tag_id,
        ]);

        return redirect()->route('auth.edit.testimonial')->with('success', 'Testimonial Video updated successfully!');
    }

    /**
     * Display the testimonial videos in the database to be deleted.
     */
    public function destroyPage()
    {
        $testimonialVideos = TestimonialVideo::paginate(8);

        return view('auth.destroy.testimonial', compact('testimonialVideos'));
    }

    /**
     * Delete the specified testimonial video in storage.
     */
    public function destroy($id)
    {
        $testimonial_video = TestimonialVideo::findOrFail($id);
        $testimonial_video->delete();

        return redirect()->route('auth.destroy.testimonial')->with('success', 'Testimonial Video deleted successfully!');
    }
}
