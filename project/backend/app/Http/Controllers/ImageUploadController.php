<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class ImageUploadController extends Controller
{
    /**
     * Handle image upload.
     */
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);

        if (!$request->hasFile('image')) {
            return response()->json(['error' => 'No image provided'], 400);
        }

        $imageFile = $request->file('image');
        $filename = Str::random(20) . '.' . $imageFile->getClientOriginalExtension();

        // Optimisation : redimensionne à 1200px max, qualité 80%
        $img = Image::make($imageFile)
            ->resize(1200, 1200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode($imageFile->getClientOriginalExtension(), 80);

        // Stocke l'image optimisée
        $path = 'images/' . $filename;
        Storage::disk('public')->put($path, $img);

        return response()->json([
            'message' => 'Image uploaded and optimized successfully',
            'path' => $path,
            'url' => '/storage/' . $path,
            'size' => Storage::disk('public')->size($path),
        ], 201);
    }

    /**
     * Delete an uploaded image.
     */
    public function delete(Request $request)
    {
        $request->validate([
            'path' => 'required|string',
        ]);

        $path = $request->input('path');

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            return response()->json(['message' => 'Image deleted successfully']);
        }

        return response()->json(['error' => 'Image not found'], 404);
    }
}

