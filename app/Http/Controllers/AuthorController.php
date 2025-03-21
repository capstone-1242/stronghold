<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function authAuthors(Request $request)
    {
        $authors = Author::paginate(8);

        return view('auth.auth-presenters', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.create.presenters');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        Author::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'description' => $request->description,
        ]);

        return redirect()->route('auth.create.presenters')->with('success', 'Presenter created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $author = null;
        if ($request->has('author_id')) {
            $author = Author::find($request->author_id);
        }

        $authors = Author::all();

        return view('auth.edit.presenters', compact('author', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $author->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'description' => $request->description,
        ]);

        return redirect()->route('auth.edit.presenters')->with('success', 'Presenter updated successfully.');
    }

    public function destroyPage()
    {
        $authors = Author::paginate(8);

        return view('auth.destroy.presenters', compact('authors'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return redirect()->route('auth.destroy.presenters')->with('success', 'Presenter deleted successfully.');
    }
}
