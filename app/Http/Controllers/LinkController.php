<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LinkController extends Controller
{
    public function authLinks(Request $request)
    {
        $links = Link::paginate(8);
        return view('auth.auth-links', compact('links'));
    }

    public function create()
    {
        $authors = Author::all();

        return view('auth.create.links', compact('authors'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'author_id' => ['required', 'exists:authors,id'],
            'url' => ['required', 'url'],
            'title' => ['required', 'string', 'max:255'],
        ], [
            'author_id.required' => 'The author ID is required.',
            'author_id.exists' => 'The selected author does not exist.',

            'url.required' => 'The URL is required.',
            'url.url' => 'Please provide a valid URL.',

            'title.required' => 'The title is required.',
        ]);

        Link::create([
            'author_id' => $request->author_id,
            'url' => $request->url,
            'title' => $request->title,
        ]);

        return redirect()->route('auth.create.links')->with('success', 'Link created successfully!');
    }

    public function edit(Request $request)
    {
        $link = null;
        if ($request->has('link_id')) {
            $link = Link::find($request->link_id);
        }

        $links = Link::all();
        $authors = Author::all();

        return view('auth.edit.links', compact('link', 'links', 'authors'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'author_id' => ['required', 'exists:authors,id'],
            'url' => ['required', 'url'],
            'title' => ['required', 'string', 'max:255'],
        ], [
            'author_id.required' => 'The author ID is required.',
            'author_id.exists' => 'The selected author does not exist.',

            'url.required' => 'The URL is required.',
            'url.url' => 'Please provide a valid URL.',

            'title.required' => 'The title is required.',
        ]);

        $link = Link::findOrFail($id);
        $link->update([
            'author_id' => $request->author_id,
            'url' => $request->url,
            'title' => $request->title,
        ]);

        return redirect()->route('auth.edit.links')->with('success', 'Link updated successfully.');
    }

    public function destroyPage()
    {
        $links = Link::paginate(8);
        return view('auth.destroy.links', compact('links'));
    }

    public function destroy($id): RedirectResponse
    {
        $link = Link::findOrFail($id);
        $link->delete();
        return redirect()->route('auth.destroy.links')->with('success', 'Link deleted successfully.');
    }
}
