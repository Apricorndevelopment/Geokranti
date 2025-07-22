<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class PasswordAgeCheck
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->password_updated_at) {
                $daysSincePasswordChange = now()->diffInDays($user->password_updated_at);

                if ($daysSincePasswordChange >= 15) {
                    // Session me ek flag store kar denge
                    session()->flash('password_change_reminder', true);
                }
            }
        }

        return $next($request);
    }
}
