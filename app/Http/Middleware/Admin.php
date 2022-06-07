<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class Admin
{
    /**
     * @return Application|RedirectResponse|Redirector|void
     */
    public function handle(Request $request, $next)
    {
        if (auth()->id() != ADMIN){
            return redirect(route('index'));
        }
        return $next($request);
    }
}
