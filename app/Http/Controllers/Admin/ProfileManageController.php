<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileManageController extends Controller
{
    //===============================show admin profile==============================//
    public function show(Request $request)
    {
        $id = $request->header('id');
        $profile = Profile::where('user_id', $id)->first();

        return Inertia::render('Admin/Profile/ProfileUpdatePage', [
            'profile' => $profile,
        ]);
    }

    //=============================update user profile=============================//
    public function update(Request $request)
    {
        $id = $request->header('id');
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        $validated_data = $request->validate([
            'first_name' => 'required|string|min:2|max:50',
            'last_name' => 'nullable|string|min:2|max:50',
            'designations' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'additional_phone' => 'nullable|string|max:15',
            'additional_email' => 'nullable|email|max:255',
            'secondary_email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:255',
        ],[
            'first_name.required' => 'First name is required.',
            'first_name.min' => 'First name must be at least 2 characters.',
            'first_name.max' => 'First name must not exceed 50 characters.',
            'last_name.min' => 'Last name must be at least 2 characters.',
            'last_name.max' => 'Last name must not exceed 50 characters.',
            'designations.required' => 'Designations is required.',
            'designations.max' => 'Designations must not exceed 255 characters.',
            'phone.required' => 'Phone number is required.',
            'phone.max' => 'Phone number must not exceed 15 characters.',
            'additional_phone.max' => 'Additional phone number must not exceed 15 characters.',
            'additional_email.max' => 'Additional email must not exceed 255 characters.',
            'secondary_email.max' => 'Secondary email must not exceed 255 characters.',
            'address.max' => 'Address must not exceed 255 characters.',
            'bio.max' => 'Bio must not exceed 255 characters.',
        ]);

        $validated_data['user_id'] = $user->id;

        // Update or the profile
        Profile::updateOrCreate(
            ['user_id' => $user->id],
            $validated_data // Data to update or create
        );

        return redirect()
            ->back()
            ->with(['message' => 'Profile updated successfully', 'status' => true]);
    }
}
