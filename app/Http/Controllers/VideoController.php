<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class VideoController extends Controller
{
    /**
     * Display a listing of the videos.
     */
    public function index(Request $request)
    {
        $searchQuery = $request->input('search', '');

        $videos = Video::with('author')
            ->when($searchQuery, function ($query) use ($searchQuery) {
                return $query->where('title', 'like', '%' . $searchQuery . '%')
                    ->orWhere('description', 'like', '%' . $searchQuery . '%');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('videos', compact('videos', 'searchQuery'));
    }

    public function authVideos(Request $request)
    {
        $videos = Video::paginate(8);

        return view('auth.auth-videos', compact('videos'));
    }


    public function authorVideos($authorId)
    {
        $author = Author::findOrFail($authorId);
        $videos = Video::where('author_id', $authorId)->paginate(6);

        return view('video-author', compact('author', 'videos'));
    }

    /**
     * Show the form for creating a new video.
     */
    public function create()
    {
        return view('auth.create.video');
    }

    /**
     * Store the newly created video in the database.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'url' => ['required', 'url'],
        ]);

        Video::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'author_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Video added successfully!');
    }

    /**
     * Display the specified video.
     */
    public function show($videoId)
    {
        $video = Video::findOrFail($videoId);
        $author = $video->author;

        $previousVideo = Video::where('author_id', $author->id)
            ->where('id', '<', $video->id)
            ->orderBy('id', 'desc')
            ->first();

        $nextVideo = Video::where('author_id', $author->id)
            ->where('id', '>', $video->id)
            ->orderBy('id', 'asc')
            ->first();

        $relatedVideos = $author->videos->take(4);

        return view('video', compact('video', 'author', 'previousVideo', 'nextVideo', 'relatedVideos'));
    }

    /**
     * Show the form for editing the specified video.
     */
    public function edit(Video $video)
    {
        // Implement edit functionality if needed
    }

    /**
     * Update the specified video in storage.
     */
    public function update(Request $request, Video $video)
    {
        // Implement update functionality if needed
    }

    /**
     * Remove the specified video from storage.
     */
    public function destroy(Video $video)
    {
        // Implement destroy functionality if needed
    }
}
