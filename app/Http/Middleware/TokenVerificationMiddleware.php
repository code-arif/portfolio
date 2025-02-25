<?php

namespace App\Http\Middleware;

use Closure;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('token');
        $result = JWTToken::verifyToken($token);
        if ($result=="unauthorized") {
            return redirect()->route('admin.login.show');
        } else {
            $request->headers->set('email', $result->email);
            $request->headers->set('username', $result->username);
            $request->headers->set('id', $result->id);
            return $next($request);
        }
    }
}
