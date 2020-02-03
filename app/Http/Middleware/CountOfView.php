<?php

namespace App\Http\Middleware;

use App\View;
use Closure;

class CountOfView
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $view = View::query()
            ->where('file_id', $request->route()->parameters['id'])
            ->first();

        if (!$view) {
            $view = new View;
            $view->view = 1;
            $view->file_id = $request->route()->parameters['id'];
            $view->save();
        }

        View::query()->where('file_id', $request->route()->parameters['id'])->increment('view');

        return $next($request);
    }
}
