<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Middleware;

use function PHPUnit\Framework\isObject;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        $token = $request->cookie('token');

        $user = null;

        if ($token) {
            $payload = JWTToken::verifyToken($token);

            if (is_object($payload) && isset($payload->username)) {
                $user = User::where('username', $payload->username)->first();
                $userProfile = Profile::where('user_id', $payload->id)->first();
            }
        }

        return array_merge(parent::share($request), [
            'flash' => [
                'message' => fn() => $request->session()->get('message'),
                'status' => fn() => $request->session()->get('status'),
                'code' => fn() => $request->session()->get('code'),
            ],
            //for user token validation
            'authUser' => [
                'authenticatedUser' => $user ?? null,
                'userProfile' => $userProfile ?? null,
            ],
        ]);
    }
}
