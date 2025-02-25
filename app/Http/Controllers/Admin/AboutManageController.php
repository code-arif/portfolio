<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutManageController extends Controller
{
        //===================show about page===================//
        public function show(Request $request, $username = null){

            $username = $request->header('username');
            $user = User::where('username', $username)->first();
            $about = About::where('user_id', $user->id)->first();
            return Inertia::render('Admin/About/AboutPage',[
                'about' => $about,
            ]);
        }
}
