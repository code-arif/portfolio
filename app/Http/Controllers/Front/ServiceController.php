<?php

namespace App\Http\Controllers\Front;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    //=================show service page================//
    public function services(){
        $services = Service::get();
        return Inertia::render('Front/ServicesPage',[
            'services' => $services,
        ]);
    }
}
