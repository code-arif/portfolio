<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\json;

class AuthController extends Controller
{
    //===============================show admin profile==============================//
    public function show($username)
    {
        $profile = User::with('profile')->where('username', $username)->first();

        if (!$profile) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return Inertia::render('Admin/ProfileUpdatePage', [
            'profile' => $profile,
        ]);
    }

    //=============================update user profile=============================//
    public function update(Request $request, $username)
    {
        // Debugging: Check incoming request data
        // dd($request->all());

        // Find the user by username
        $user = User::where('username', $username)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        $profile = Profile::where('user_id', $user->id)->first();

        if (!$profile) {
            return response()->json(['error' => 'Profile not found.'], 404);
        }

        $validated_data = $request->validate([
            'first_name' => 'required|string|min:2|max:50',
            'last_name' => 'required|string|min:2|max:50',
            'designations' => 'nullable|string|max:255',
            'phone' => 'required|string|max:15',
            'additional_phone' => 'nullable|string|max:15',
            'additional_email' => 'nullable|email|max:255',
            'secondary_email' => 'nullable|email|max:255',
            'address' => 'required|string|max:255',
            'image_one' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_two' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'linkedin' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'github' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'fiverr' => 'nullable|string|max:255',
            'upwork' => 'nullable|string|max:255',
            'freelancer' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'user_id' => 'required',
        ]);

        // Handle image uploads
        if ($request->hasFile('image_one')) {
            if ($profile->image_one && Storage::disk('public')->exists($profile->image_one)) {
                Storage::disk('public')->delete($profile->image_one);
            }
            $image_one = $request->file('image_one');
            $imageOneNameToStore = uniqid() . '.' . $image_one->getClientOriginalExtension();
            $image_one_url = $image_one->storeAs('image_one', $imageOneNameToStore, 'public');
            $validated_data['image_one'] = $image_one_url;
        }

        if ($request->hasFile('image_two')) {
            if ($profile->image_two && Storage::disk('public')->exists($profile->image_two)) {
                Storage::disk('public')->delete($profile->image_two);
            }
            $image_two = $request->file('image_two');
            $imageNameToStore = uniqid() . '.' . $image_two->getClientOriginalExtension();
            $image_two_url = $image_two->storeAs('image_two', $imageNameToStore, 'public');
            $validated_data['image_two'] = $image_two_url;
        }

        // Update the profile
        $profile->update($validated_data);

        return redirect()
            ->back()
            ->with(['message' => 'Profile updated successfully', 'status' => true]);
    }
}
