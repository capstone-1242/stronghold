<?php

namespace App\Http\Controllers;

use App\Models\Memorial;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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

    /**
     * Display a listing of the memorials in the database.
     */
    public function authMemorials(Request $request)
    {
        $memorials = Memorial::paginate(8);

        return view('auth.auth-memorials', compact('memorials'));
    }

    /**
     * Show the form for creating a new memorial.
     */
    public function create()
    {
        $tags = Tag::all();

        return view('auth.create.memorial', compact('tags'));
    }

    /**
     * Store a newly created memorial in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'biography' => ['required', 'string'],
            'birth_year' => ['nullable', 'date_format:Y'],
            'death_year' => [
                'nullable',
                'date_format:Y',
                function ($attribute, $value, $error) use ($request) {
                    $birthYear = $request->input('birth_year');

                    if ($birthYear && $value && $value < $birthYear) {
                        $error('The death year must not be earlier than the birth year.');
                    }
                }
            ],
            'tag_id' => ['required', 'exists:tags,id'],
        ], [
            'first_name.required' => 'The first name is required.',
            'first_name.max' => 'The first name cannot exceed 255 characters.',
            
            'last_name.required' => 'The last name is required.',
            'last_name.max' => 'The last name cannot exceed 255 characters.',
            
            'biography.required' => 'The biography is required.',
            
            'birth_year.date_format' => 'The birth year must be a valid year format (YYYY).',
            
            'death_year.date_format' => 'The death year must be a valid year format (YYYY).',
            
            'tag_id.required' => 'The tag is required.',
            'tag_id.exists' => 'The selected tag is invalid.',
        ]);

        Memorial::create([
            'user_id' => Auth::id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'biography' => $request->biography,
            'birth_year' => $request->birth_year,
            'death_year' => $request->death_year,
            'tag_id' => $request->tag_id,
        ]);

        return redirect()->route('auth.create.memorial')->with('success', 'Memorial created successfully! To add images to the memorial go to the "Add Memorial Images" page.');
    }

    /**
     * Show the form for editing the specified memorial.
     */
    public function edit(Request $request)
    {
        $memorial = null;
        if ($request->has('memorial_id')) {
            $memorial = Memorial::find($request->memorial_id);
        }

        $memorials = Memorial::all();
        $tags = Tag::all();

        return view('auth.edit.memorial', compact('memorial', 'memorials', 'tags'));
    }

    /**
     * Update the specified memorial in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'biography' => ['required', 'string'],
            'birth_year' => ['nullable', 'date_format:Y'],
            'death_year' => [
                'nullable',
                'date_format:Y',
                function ($attribute, $value, $error) use ($request) {
                    $birthYear = $request->input('birth_year');

                    if ($birthYear && $value && $value < $birthYear) {
                        $error('The death year must not be earlier than the birth year.');
                    }
                }
            ],
            'tag_id' => ['nullable', 'exists:tags,id'],
        ], [
            'first_name.required' => 'The first name is required.',
            'first_name.max' => 'The first name cannot exceed 255 characters.',
            
            'last_name.required' => 'The last name is required.',
            'last_name.max' => 'The last name cannot exceed 255 characters.',
            
            'biography.required' => 'The biography is required.',
            
            'birth_year.date_format' => 'The birth year must be a valid year format (YYYY).',
            
            'death_year.date_format' => 'The death year must be a valid year format (YYYY).',
            
            'tag_id.required' => 'The tag is required.',
            'tag_id.exists' => 'The selected tag is invalid.',
        ]);

        $memorial = Memorial::findOrFail($id);

        $memorial->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'biography' => $request->biography,
            'birth_year' => $request->birth_year,
            'death_year' => $request->death_year,
            'tag_id' => $request->tag_id,
        ]);

        return redirect()->route('auth.edit.memorial')->with('success', 'Memorial updated successfully!');
    }

    /**
     * Display the memorials in the database to be deleted.
     */
    public function destroyPage()
    {
        $memorials = Memorial::paginate(8);

        return view('auth.destroy.memorial', compact('memorials'));
    }

    /**
     * Delete the specified memorial in storage.
     */
    public function destroy($id)
    {
        $memorial = Memorial::with('memorialImages')->findOrFail($id);

        if ($memorial->memorialImages->isNotEmpty()) {
            foreach ($memorial->memorialImages as $memorialImage) {
                $imagePath = storage_path('app/public/' . $memorialImage->filename);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                $memorialImage->delete();
            }
        }

        $memorial->delete();

        return redirect()->route('auth.destroy.memorial')->with('success', 'Memorial and associated images deleted successfully.');
    }
}
