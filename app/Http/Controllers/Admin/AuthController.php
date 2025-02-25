<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Profile;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use function Pest\Laravel\json;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    //=======================show admin login page========================//
    public function showLogin(){
        return Inertia::render('Admin/LoginPage');
    }

    //======================admin login===================================//
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|exists:users,password',
        ],[
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email',
            'email.exists' => 'Email does not exist',
            'password.required' => 'Password is required',
            'password.exists' => 'Password does not match'
        ]);

        $user = User::where('email', $request->input('email'))->where('password', $request->input('password'))->first();

        if ($user !== null) {
            $token = JWTToken::generateToken($request->input('email'), $user->username, $user->id);

            $data = ['message' => 'Login successful', 'status' => true, 'code' => 200];

            return redirect()
                ->route('show.admin.dashbaord')
                ->with($data)
                ->cookie('token', $token, 60 * 24 * 7);
        } else {
            $data = ['message' => 'Invalid email or password', 'status' => false, 'code' => 401];
            return redirect()->back()->with($data);
        }
    }

    //==============================logout================================//
    public function logout(){
        return redirect()->route('admin.login.show')
        ->cookie('token', '', -1);
    }
}
