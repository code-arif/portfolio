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

            if (!$profile) {
                return response()->json(['error' => 'User not found'], 404);
            }
    
            return Inertia::render('Admin/ProfileUpdatePage', [
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
    
            $profile = null;
    
            $profile = Profile::where('user_id', $user->id)->first();
            if (!$profile) {
                return response()->json(['error' => 'Profile not found.'], 404);
            }
    
            $validated_data = $request->validate([
                'first_name' => 'required|string|min:2|max:50',
                'last_name' => 'nullable|string|min:2|max:50',
                'designations' => 'nullable|string|max:255',
                'phone' => 'required|string|max:15',
                'additional_phone' => 'nullable|string|max:15',
                'additional_email' => 'nullable|email|max:255',
                'secondary_email' => 'nullable|email|max:255',
                'address' => 'nullable|string|max:255',
                'bio' => 'nullable|string|max:255',
                'user_id' => 'required',
            ]);
            // Update the profile
            $profile->update($validated_data);
    
            return redirect()
                ->back()
                ->with(['message' => 'Profile updated successfully', 'status' => true]);
        }
}
