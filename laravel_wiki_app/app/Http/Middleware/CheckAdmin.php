<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class CheckAdmin
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
        /**
         * Admin mail irasom i .env faila
         * pvz kur nors po apacia
         * ADMIN_MAIL="admin@test.lt"
         */
        if(Auth::user()->email === env('ADMIN_MAIL'))
            return $next($request);
        else
            return redirect('/');
    }
}