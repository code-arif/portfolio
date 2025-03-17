<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;

class AboutManageController extends Controller
{
    //===================show about page===================//
    public function show(Request $request)
    {
        $id = $request->header('id');
        $about = About::where('user_id', $id)->first();
        $image = Image::where('user_id', $id)->first();
        return Inertia::render('Admin/About/AboutUpdatePage', [
            'about' => $about,
            'image' => $image,
        ]);
    }

    //===================update about===================//
    public function update(Request $request){
        $id = $request->header('id');
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        $validated_data = $request->validate([
            'short_description' => 'required|string|max:5000',
            'long_description' => 'required|string|max:65000',
        ],[
            'short_description.required' => 'Short description is required.',
            'short_description.max' => 'Short description must not be greater than 5000 characters.',
            'long_description.required' => 'Long description is required.',
            'long_description.max' => 'Long description must not be greater than 65000 characters.',
        ]);

        $validated_data['user_id'] = $id;
        About::updateOrCreate(['user_id' => $id], $validated_data);

        return redirect()->back()->with(['message' => 'About updated successfully.', 'status' => true]);
    }
}
