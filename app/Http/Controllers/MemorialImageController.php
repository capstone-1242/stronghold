<?php

namespace App\Http\Controllers;

use App\Models\Memorial;
use App\Models\MemorialImage;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class MemorialImageController extends Controller
{
    /**
     * Display a listing of the memorial images in the database.
     */
    public function authMemorialImages(Request $request)
    {
        $memorials = Memorial::all();
        $selectedMemorials = $request->get('memorials', []);

        $memorialImages = MemorialImage::when(count($selectedMemorials) > 0, function ($query) use ($selectedMemorials) {
            return $query->whereIn('memorial_id', $selectedMemorials);
        })->orderBy('memorial_id')
            ->paginate(6);

        return view('auth.auth-memorial-images', compact('memorials', 'memorialImages', 'selectedMemorials'));
    }

    /**
     * Show the form for creating a new memorial image.
     */
    public function create()
    {
        $memorials = Memorial::all();

        return view('auth.create.memorial-images', compact('memorials'));
    }

    /**
     * Store a newly created testimonial video in the database.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'memorial_id' => ['required', 'exists:memorials,id'],
            'filename' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp|max:2048'],
            'description' => ['required', 'string', 'max:255'],
        ], [            
            'filename.required' => 'The image file is required.',
            'filename.image' => 'The file must be an image.',
            'filename.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, or svg.',
            'filename.max' => 'The image size cannot exceed 2MB.',
            
            'description.required' => 'The description is required.',
            'description.max' => 'The description cannot exceed 255 characters.',
        ]);

        $imagePath = $request->file('filename')->store('memorial_images', 'public');

        MemorialImage::create([
            'memorial_id' => $request->memorial_id,
            'filename' => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('auth.create.memorial-images')->with('success', 'Memorial image added successfully!');
    }

    /**
     * Show the form for editing the specified memorial image.
     */
    public function edit(Request $request)
    {
        $memorials = Memorial::all();

        $selectedMemorial = null;
        if ($request->has('memorial_id')) {
            $selectedMemorial = Memorial::find($request->get('memorial_id'));
        }

        $memorialImages = null;
        if ($selectedMemorial) {
            $memorialImages = $selectedMemorial->memorialImages()->paginate(6);
        }

        $memorialImage = null;
        if ($request->has('memorial_image_id')) {
            $memorialImage = MemorialImage::find($request->get('memorial_image_id'));
        }

        return view('auth.edit.memorial-images', compact('memorials', 'selectedMemorial', 'memorialImages', 'memorialImage'));
    }

    /**
     * Update the specified memorial image in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'memorial_id' => ['required', 'exists:memorials,id'],
            'filename' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'description' => ['nullable', 'string', 'max:255'],
        ], [            
            'filename.required' => 'The image file is required.',
            'filename.image' => 'The file must be an image.',
            'filename.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg, webp.',
            'filename.max' => 'The image size cannot exceed 2MB.',
            
            'description.required' => 'The description is required.',
            'description.max' => 'The description cannot exceed 255 characters.',
        ]);

        $memorialImage = MemorialImage::findOrFail($id);

        if ($request->hasFile('filename')) {
            $oldImagePath = storage_path('app/public/' . $memorialImage->filename);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            $imagePath = $request->file('filename')->store('memorial_images', 'public');
            $memorialImage->filename = $imagePath;
        }

        $memorialImage->memorial_id = $request->memorial_id;
        $memorialImage->description = $request->description;
        $memorialImage->save();

        return redirect()->route('auth.edit.memorial-images', ['memorial_image_id' => $memorialImage->id])->with('success', 'Memorial image updated successfully!');
    }

    /**
     * Display the testimonial videos in the database to be deleted.
     */
    public function destroyPage()
    {
        $memorialImages = MemorialImage::orderBy('memorial_id')
            ->paginate(6);

        $groupedMemorialImages = $memorialImages->groupBy('memorial_id');

        return view('auth.destroy.memorial-images', compact('groupedMemorialImages', 'memorialImages'));
    }

    /**
     * Delete the specified memorial image in storage.
     */
    public function destroy($id)
    {
        $memorialImage = MemorialImage::findOrFail($id);

        $imagePath = storage_path('app/public/' . $memorialImage->filename);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $memorialImage->delete();

        return redirect()->route('auth.destroy.memorial-images', ['id' => $memorialImage->id])->with('success', 'Memorial Image deleted successfully!');
    }
}
