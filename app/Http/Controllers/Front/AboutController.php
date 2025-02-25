<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AboutController extends Controller
{
    //=======================show about page========================//
    public function showAbout(){
        return Inertia::render('Front/AboutPage');
    }
}
