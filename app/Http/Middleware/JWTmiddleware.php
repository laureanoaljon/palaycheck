<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Tymon\JWTAuth\Facades\JWTAuth;


class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);


        $message = '';

        try {
            // check token validation
            JWTAuth::parseToken()->authenticate();
            return $next($request);

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            $message = 'token expired';
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            $message = 'Invalid token';

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            $message = 'Provide Token';
        }

        return response()->json([
            'status' => 'failed',
            'message' => 'error '.$message
        ]);


    }
}
