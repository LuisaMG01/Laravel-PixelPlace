<?php

namespace App\Utils;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request, string $productName): void
    {
        if ($request->hasFile('profile_image')) {
            Storage::disk('public')->put(
                "$productName.png",
                file_get_contents($request->file('profile_image')->getRealPath())
            );
        }
    }
}
