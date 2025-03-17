<?php

namespace App\Http\Controllers\Front;

use Inertia\Inertia;
use App\Models\About;
use App\Models\Image;
use App\Models\Skill;
use App\Models\Profile;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    //=======================show about page========================//
    public function showAbout()
    {
        $profile = Profile::first();
        $about = About::first();
        $image = Image::select('about_image')->first();
        $social_link = SocialLink::first();
        $skills = Skill::get();
        // return $skills;exit();
        return Inertia::render('Front/AboutPage', [
            'profile' => $profile,
            'about' => $about,
            'image' => $image,
            'social_link' => $social_link,
            'skills' => $skills,
        ]);
    }
}
