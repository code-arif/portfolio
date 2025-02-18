<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Storage;

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
        $user = User::where('username', $username)->first();

        $profile = Profile::where('user_id', $user->id)->first();

        // Check if the profile exists
        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        $messages = [
            'first_name.required' => 'First name is required.',
            'first_name.min' => 'First name must be at least 2 characters.',
            'first_name.max' => 'First name must not be more than 50 characters.',
            'last_name.required' => 'Last name is required.',
            'last_name.min' => 'Last name must be at least 2 characters.',
            'last_name.max' => 'Last name must not be more than 50 characters.',
            'designations.string' => 'Designation must be a string.',
            'designations.max' => 'Designation must not be more than 255 characters.',
            'phone.required' => 'Phone number is required.',
            'additional_phone.max' => 'Additional phone number must not be more than 15 characters.',
            'additional_email.email' => 'Additional email must be a valid email address.',
            'additional_email.max' => 'Additional email must not be more than 255 characters.',
            'secondary_email.email' => 'Additional email must be a valid email address.',
            'secondary_email.max' => 'Additional email must not be more than 255 characters.',
            'address.required' => 'Address is required.',
            'address.max' => 'Address must not be more than 255 characters.',
            'linkedin.url' => 'LinkedIn must be a valid URL.',
            'linkedin.max' => 'LinkedIn must not be more than 255 characters.',
            'facebook.url' => 'Facebook must be a valid URL.',
            'facebook.max' => 'Facebook must not be more than 255 characters.',
            'github.url' => 'Github must be a valid URL.',
            'github.max' => 'Github must not be more than 255 characters.',
            'twitter.url' => 'Twitter must be a valid URL.',
            'twitter.max' => 'Twitter must not be more than 255 characters.',
            'instagram.url' => 'Instagram must be a valid URL.',
            'instagram.max' => 'Instagram must not be more than 255 characters.',
            'fiverr.url' => 'Fiverr must be a valid URL.',
            'fiverr.max' => 'Fiverr must not be more than 255 characters',
            'upwork.url' => 'Upwork must be a valid URL.',
            'upwork.max' => 'Upwork must not be more than 255 characters.',
            'freelancer.url' => 'Freelancer must be a valid URL.',
            'freelancer.max' => 'Freelancer must not be more than 255 characters',
            'bio.max' => 'Bio must not be more than 255 characters.',
        ];

        $validated_data = $request->validate(
            [
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'designations' => 'nullable|string|max:255',
                'phone' => 'required|string|max:15',
                'additional_phone' => 'nullable|string|max:15',
                'additional_email' => 'nullable|email|max:50',
                'secondary_email' => 'nullable|email|max:50',
                'address' => 'required|string|max:255',
                'image_one' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'image_two' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'linkedin' => 'nullable|url|max:255',
                'facebook' => 'nullable|url|max:255',
                'github' => 'nullable|url|max:255',
                'twitter' => 'nullable|url|max:255',
                'instagram' => 'nullable|url|max:255',
                'fiverr' => 'nullable|url|max:255',
                'upwork' => 'nullable|url|max:255',
                'freelancer' => 'nullable|url|max:255',
                'bio' => 'nullable|string|max:255',
                'short_description' => 'nullable',
                'long_description' => 'nullable',
            ],
            $messages,
        );

        return $validated_data;dd();

        $validated_data['user_id'] = $user->id;
        // Handle image uploads if any
        if ($request->hasFile('image_one')) {
            if ($profile->image_one && Storage::exists('public/' . $profile->image_one)) {
                Storage::delete('public/' . $profile->image_one);
            }
            $profile->image_one = $request->file('image_one')->store('profiles', 'public');
        }

        if ($request->hasFile('image_two')) {
            if ($profile->image_two && Storage::exists('public/' . $profile->image_two)) {
                Storage::delete('public/' . $profile->image_two);
            }
            $profile->image_two = $request->file('image_two')->store('profiles', 'public');
        }



        if ($profile->update($validated_data)) {
            return redirect()->back()->with(['message' => 'Profile updated successfully!', 'status' => true]);
        }else {
            return redirect()->back()->with(['message', 'Failed to update profile!', 'status'=> false]);
        }
    }
}
