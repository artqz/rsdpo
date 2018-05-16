<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
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

        if ($user->role_id == 1 || $user->role_id == 2) {
            return $next($request);
        }

        return redirect('/')
            ->with([
                'flash_message' => 'Вы не администратор',
                'flash_message_status' => 'danger',
            ]);
    }
}
