<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function home(){
        return Inertia::render('Front/HomePage');
    }

    public function about(){
        return Inertia::render('Front/AboutPage');
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

    public function services(){
        return Inertia::render('Front/ServicesPage');
    }

}
