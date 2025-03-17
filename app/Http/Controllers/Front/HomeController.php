<?php

namespace App\Http\Controllers\Front;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Image;
use App\Models\Profile;
use App\Models\SocialLink;

class HomeController extends Controller
{
    //======================get profile, about and hero_image for home page hero section =====================//
    public function index(){
        $profile = Profile::first();
        $about = About::select('short_description')->first();
        $image = Image::select('hero_image')->first();
        return Inertia::render('Front/HomePage', [
            'profile' => $profile,
            'about' => $about,
            'image' => $image,
        ]);
    }

    //====================get profile form topbar section=====================//
    public function getProfile(){
        $profile = Profile::select('additional_email', 'phone')->first();
        $social_links = SocialLink::first();
        return response()->json([$profile, $social_links]);
    }

    public function portfolio(){
        return Inertia::render('Front/PortfolioPage');
    }

    public function blog(){
        return Inertia::render('Front/BlogPage');
    }

    public function singleBlog(){
        return Inertia::render('Front/SingleBlogPage');
    }

    public function contact(){
        return Inertia::render('Front/ContactPage');
    }

}
