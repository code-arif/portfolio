<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialLinkController extends Controller
{
    //===============show social links page=====================//
    public function getSocialLink(Request $request){
        $user_id = $request->header('id');
        $social_links = SocialLink::where('user_id', $user_id)->first();
        return Inertia::render('Admin/SocialLink/SocialLinkPage', [
            'social_links' => $social_links,
        ]);
    }

    
    //===================update social links=====================//
    public function updateSocialLink(Request $request){
        $user_id = $request->header('id');
        $user = User::find($user_id);
        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        $validated_data = $request->validate([
            'linkedin' => 'nullable|string|max: 255',
            'facebook' => 'nullable|string|max: 255',
            'twitter' => 'nullable|string|max: 255',
            'instagram' => 'nullable|string|max: 255',
            'github' => 'nullable|string|max: 255',
            'fiverr' => 'nullable|string|max: 255',
            'upwork' => 'nullable|string|max: 255',
            'freelancer' => 'nullable|string|max: 255',
        ],[
            'linkedin.string' => 'linkedin must be a string',
            'linkedin.max' => 'linkedin must be less than or equal to 255 characters',
            'facebook.string' => 'facebook must be a string',
            'facebook.max' => 'facebook must be less than or equal to 255 characters',
            'twitter.string' => 'twitter must be a string',
            'twitter.max' => 'twitter must be less than or equal to 255 characters',
            'instagram.string' => 'instagram must be a string',
            'instagram.max' => 'instagram must be less than or equal to 255 characters',
            'github.string' => 'github must be a string',
            'github.max' => 'github must be less than or equal to 255 characters',
            'fiverr.string' => 'fiverr must be a string',
            'fiverr.max' => 'fiverr must be less than or equal to 255 characters',
            'upwork.string' => 'upwork must be a string',
            'upwork.max' => 'upwork must be less than or equal to 255 characters',
            'freelancer.string' => 'freelancer must be a string',
            'freelancer.max' => 'freelancer must be less than or equal to 255 characters',
        ]);

        $validated_data['user_id'] = $user->id;

        SocialLink::updateOrCreate(
            ['user_id' => $user->id],
            $validated_data
        );

        return redirect()
            ->back()
            ->with(['message' => 'Links save successfully', 'status' => true]);
    }

}
