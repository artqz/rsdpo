<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class FilterVerifiedUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (!$user->is_verified) {
            Auth::guard()->logout();
            return redirect('/')
                ->with([
                    'flash_message' => 'Ваша учетная запись не активирована!',
                    'flash_message_status' => 'danger',
                ]);
        }

        return $next($request);
    }
}
