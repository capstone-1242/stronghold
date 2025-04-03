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

    /**
     * Display a listing of the videos made by a specific author.
     */
    public function authorVideos($authorId)
    {
        $author = Author::findOrFail($authorId);
        $videos = Video::where('author_id', $authorId)->paginate(6);

        return view('video-author', compact('author', 'videos'));
    }

    /**
     * Display the specified video.
     */
    public function show($videoId)
    {
        $video = Video::findOrFail($videoId);
        $author = $video->author()->with('links')->first();

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
     * Display a listing of the videos in the database.
     */
    public function authVideos(Request $request)
    {
        $videos = Video::paginate(8);

        return view('auth.auth-videos', compact('videos'));
    }

    /**
     * Show the form for creating a new video.
     */
    public function create()
    {
        $authors = Author::all();

        return view('auth.create.video', compact('authors'));
    }

    /**
     * Store a newly created video in the database.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'url' => ['required', 'url'],
            'author_id' => ['required', 'exists:authors,id'],
        ], [
            'title.required' => 'The title is required.',
            'title.max' => 'The title cannot exceed 255 characters.',
        
            'description.required' => 'The description is required.',
        
            'url.required' => 'The URL is required.',
            'url.url' => 'Please provide a valid URL.',
        
            'author_id.required' => 'The author is required.',
            'author_id.exists' => 'The selected author is invalid.',
        ]);

        Video::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'author_id' => $request->author_id,
        ]);

        return redirect()->route('auth.create.video')->with('success', 'Video added successfully!');
    }

    /**
     * Show the form for editing the specified video.
     */
    public function edit(Request $request)
    {
        $video = null;
        if ($request->has('video_id')) {
            $video = Video::find($request->video_id);
        }
    
        $videos = Video::all();
        $authors = Author::all();
    
        return view('auth.edit.video', compact('video', 'videos', 'authors'));
    }
    
    /**
     * Update the specified video in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'url' => ['required', 'url'],
            'author_id' => ['required', 'exists:authors,id'],
        ], [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title cannot exceed 255 characters.',
        
            'description.required' => 'The description field is required.',
        
            'url.required' => 'The URL field is required.',
            'url.url' => 'Please provide a valid URL.',
        
            'author_id.required' => 'The author is required.',
            'author_id.exists' => 'The selected author is invalid.',
        ]);

        $video = Video::findOrFail($id);

        $video->update([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'author_id' => $request->author_id,
        ]);

        return redirect()->route('auth.edit.video')->with('success', 'Video updated successfully!');
    }

    /**
     * Display the videos in the database to be deleted.
     */
    public function destroyPage()
    {
        $videos = Video::paginate(8);

        return view('auth.destroy.video', compact('videos'));
    }

    /**
     * Delete the specified video in storage.
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return redirect()->route('auth.destroy.video')->with('success', 'Video deleted successfully.');
    }
}
