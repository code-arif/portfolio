<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function storeImage(Request $request)
    {
        $id = $request->header('id');

       $request->validate([
            'hero_image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about_image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'hero_image.mimes' => 'Only jpeg, png, jpg, gif, svg files are allowed',
            'hero_image.max' => 'Image size should not be greater than 2MB',
            'about_image.mimes' => 'Only jpeg, png, jpg, gif, svg files',
            'about_image.max' => 'Image size should not be greater than 2MB',
            'logo.mimes' => 'Only jpeg, png, jpg, gif, svg files',
            'logo.max' => 'Image size should not be greater than 2MB',
        ]);

        // Fetch existing image record
        $image = Image::where('user_id', $id)->first();

        $imageData = ['user_id' => $id];

        // Handle hero image
        if ($request->hasFile('hero_image')) {
            if ($image && $image->hero_image) {
                Storage::disk('public')->delete($image->hero_image);
            }
            $imageData['hero_image'] = $request->file('hero_image')->store('hero_image', 'public');
        }

        // Handle about image
        if ($request->hasFile('about_image')) {
            if ($image && $image->about_image) {
                Storage::disk('public')->delete($image->about_image);
            }
            $imageData['about_image'] = $request->file('about_image')->store('about_image', 'public');
        }

        // Handle logo
        if ($request->hasFile('logo')) {
            if ($image && $image->logo) {
                Storage::disk('public')->delete($image->logo);
            }
            $imageData['logo'] = $request->file('logo')->store('logo', 'public');
        }

        Image::updateOrCreate(['user_id' => $id], $imageData);

        return redirect()->back()->with(['message' => 'Image updated successfully', 'status' => true]);
    }
}
