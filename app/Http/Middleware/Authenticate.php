<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request): ?string
    {
        // If the request expects JSON we return null so Laravel returns 401.
        if (! $request->expectsJson()) {
            // Default login route.  Change this if you have separate logins.
            return route('auth.login');
        }
        return null;
    }
}
