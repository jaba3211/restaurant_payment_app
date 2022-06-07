<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class Staff
{
    /**
     * @return Application|RedirectResponse|Redirector|void
     */
    public function handle(Request $request, $next)
    {
        if (auth()->user()->status_id != STAFF){
            return redirect(route('index'));
        }
        return $next($request);
    }
}
