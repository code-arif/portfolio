<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function dashboard(){
        return Inertia::render('Admin/DashboardPage');
    }

    public function create_blog(){
        return Inertia::render('Admin/CreateBlogPage');
    }



    // public function profile(){
    //     return Inertia::render('Admin/ProfileUpdatePage');
    // }
}
