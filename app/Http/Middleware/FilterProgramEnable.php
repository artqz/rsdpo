<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;

class FilterProgramEnable
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
   
        if (!$user->programs->where('id', $request->id)->first()) {
            return redirect('/base')
                ->with([
                    'flash_message' => 'Эта программа вам не доступна!',
                    'flash_message_status' => 'danger',
                ]);
        }

        elseif (Carbon::parse($user->programs->where('id', $request->id)->first()->pivot->deleted_at) <= Carbon::now()) {
            return redirect('/base')
                ->with([
                    'flash_message' => 'Время обучения закончено!',
                    'flash_message_status' => 'danger',
                ]);
        }
        return $next($request);
    }
}
