<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the authors in the database.
     */
    public function authAuthors(Request $request)
    {
        $authors = Author::paginate(8);

        return view('auth.auth-presenters', compact('authors'));
    }

    /**
     * Show the form for creating a new author.
     */
    public function create()
    {
        return view('auth.create.presenters');
    }

    /**
     * Store a newly created author in the database.
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ], [
            'first_name.required' => 'The first name is required.',
            'first_name.max' => 'The first name may not be greater than 255 characters.',
            
            'last_name.required' => 'The last name is required.',
            'last_name.max' => 'The last name may not be greater than 255 characters.',
            
            'description.required' => 'The description is required.',
        ]);

        Author::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'description' => $request->description,
        ]);

        return redirect()->route('auth.create.presenters')->with('success', 'Presenter created successfully!');
    }

    /**
     * Show the form for editing the specified author.
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
     * Update the specified author in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ], [
            'first_name.required' => 'The first name is required.',
            'first_name.max' => 'The first name may not be greater than 255 characters.',
            
            'last_name.required' => 'The last name is required.',
            'last_name.max' => 'The last name may not be greater than 255 characters.',
            
            'description.required' => 'The description is required.',
        ]);

        $author = Author::findOrFail($id);

        $author->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'description' => $request->description,
        ]);

        return redirect()->route('auth.edit.presenters')->with('success', 'Presenter updated successfully.');
    }

    /**
     * Display the authors in the database to be deleted.
     */
    public function destroyPage()
    {
        $authors = Author::paginate(8);

        return view('auth.destroy.presenters', compact('authors'));
    }

    /**
     * Delete the specified author in storage.
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);

        $author->links()->delete();
        $author->videos()->delete();

        $author->delete();

        return redirect()->route('auth.destroy.presenters')->with('success', 'Presenter and all associated data deleted successfully.');
    }
}
