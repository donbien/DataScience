<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Requests\Request;
class StudentMiddleware
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
        if ($request->user() && $request->user()->role_id != 2)
        {
           return view('unauthorized');
        }
        return $next($request);
    }

}
