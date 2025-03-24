<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resources in the database.
     */
    public function authResources(Request $request)
    {
        $resources = Resource::paginate(8);

        return view('auth.auth-resources', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all(); 

        return view('auth.create.resource', compact('tags'));
    }

    /**
     * Store a newly created resource in the database.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'url' => ['required', 'url'],
            'number' => ['nullable', 'string'],
            'tag_id' => ['nullable', 'exists:tags,id'],
        ], [
            'title.required' => 'The title is required.',
            'title.max' => 'The title cannot exceed 255 characters.',
        
            'url.required' => 'The URL is required.',
            'url.url' => 'Please provide a valid URL.',
        ]);

        Resource::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'number' => $request->number,
            'tag_id' => $request->tag_id,
        ]);

        return redirect()->route('auth.create.resource')->with('success', 'Resource added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $resource = null;
        if ($request->has('resource_id')) {
            $resource = Resource::find($request->resource_id);
        }

        $resources = Resource::all();
        $tags = Tag::all();

        return view('auth.edit.resource', compact('resource', 'resources', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'url' => ['required', 'url'],
            'number' => ['nullable', 'string'],
            'tag_id' => ['nullable', 'exists:tags,id'],
        ], [
            'title.required' => 'The title is required.',
            'title.max' => 'The title cannot exceed 255 characters.',
        
            'url.required' => 'The URL is required.',
            'url.url' => 'Please provide a valid URL.',
        ]);

        $resource = Resource::findOrFail($id);

        $resource->update([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'number' => $request->number,
            'tag_id' => $request->tag_id,
        ]);

        return redirect()->route('auth.edit.resource')->with('success', 'Resource updated successfully!');
    }

    /**
     * Display the resources in the database to be deleted.
     */
    public function destroyPage()
    {
        $resources = Resource::paginate(8);

        return view('auth.destroy.resource', compact('resources'));
    }

    /**
     * Delete the specified resource in storage.
     */
    public function destroy($id): RedirectResponse
    {
        $resource = Resource::findOrFail($id);
        $resource->delete();

        return redirect()->route('auth.destroy.resource')->with('success', 'Resource deleted successfully.');
    }
}
