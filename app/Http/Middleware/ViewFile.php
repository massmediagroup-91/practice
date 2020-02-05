<?php

namespace App\Http\Middleware;

use App\File;
use Closure;
use Illuminate\Support\Facades\Auth;

class ViewFile
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
        $user = File::query()
            ->where('id', $request->route()->parameters['id'])
            ->firstOrFail('user_id');

        if ($user->user_id !== $request->user()->id) {
            abort(403, 'Forbidden');
        }

        return $next($request);
    }
}
