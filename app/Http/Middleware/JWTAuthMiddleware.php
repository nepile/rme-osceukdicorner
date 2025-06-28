<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        try {
            $token = session('jwt_token');
            $user = session('user');

            if (!$token) {
                return abort(403);
            }

            $payload = JWTAuth::setToken($token)->getPayload();

            $userId = $payload->get('sub');

            $request->merge(['auth_user_id' => $userId]);
            $request->merge(['auth_user' => $user]);
        } catch (JWTException $e) {
            return redirect()->route('login')->with('warning', 'Token tidak valid: ' . $e->getMessage());
        }

        return $next($request);
    }
}
