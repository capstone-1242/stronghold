<?php

namespace App\Http\Controllers;

use App\Models\Memorial;
use App\Models\Tag;
use App\Http\Requests\StorememorialRequest;
use App\Http\Requests\UpdatememorialRequest;
use Illuminate\Http\Request;

class MemorialController extends Controller
{
    /**
     * Display a listing of the memorials.
     */
    public function index(Request $request)
    {
        $tags = Tag::all();
        $selectedTags = $request->get('tags', []);

        $memorials = Memorial::when(count($selectedTags) > 0, function ($query) use ($selectedTags) {
            return $query->whereIn('tag_id', $selectedTags);
        })->paginate(6);

        return view('memorials', compact('tags', 'memorials', 'selectedTags'));
    }


    /**
     * Show the form for creating a new memorial.
     */
    public function create()
    {
        return view('memorials.create');
    }

    /**
     * Store a newly created memorial in storage.
     */
    public function store(StorememorialRequest $request)
    {
        $memorial = Memorial::create($request->all());
        return redirect()->route('memorial', ['memorial' => $memorial->id]);
    }

    /**
     * Display the specified memorial.
     */
    public function show($id)
    {
        $memorial = Memorial::findOrFail($id);

        $nextMemorial = Memorial::where('id', '>', $memorial->id)->orderBy('id', 'asc')->first();
        $previousMemorial = Memorial::where('id', '<', $memorial->id)->orderBy('id', 'desc')->first();

        return view('memorial', [
            'memorial' => $memorial,
            'previousMemorial' => $previousMemorial,
            'nextMemorial' => $nextMemorial
        ]);
    }

    public function authMemorials(Request $request)
    {
        $memorials = Memorial::paginate(8);

        return view('auth.auth-memorials', compact('memorials'));
    }


    /**
     * Show the form for editing the specified memorial.
     */
    public function edit(Memorial $memorial)
    {
        return view('memorials.edit', compact('memorial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatememorialRequest $request, Memorial $memorial)
    {
        $memorial->update($request->validated());
        return redirect()->route('memorials');
    }

    /**
     * Remove the specified memorial from storage.
     */
    public function destroy(Memorial $memorial)
    {
        $memorial->delete();
        return redirect()->route('memorials');
    }
}
