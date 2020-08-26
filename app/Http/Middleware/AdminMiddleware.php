<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {

    //     if (!Auth::guard('admin')->check()) {
    //     return redirect()->route('admin.form');
    //     }

    //     return $next($request);
    // }

    public function handle($request, Closure $next)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect(route('admin.form'));
        }

        return $next($request);
    }
}
