<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function home(){
        return Inertia::render('HomePage');
    }

    public function about(){
        return Inertia::render('AboutPage');
    }

    public function portfolio(){
        return Inertia::render('PortfolioPage');
    }

    public function blog(){
        return Inertia::render('BlogPage');
    }


}
