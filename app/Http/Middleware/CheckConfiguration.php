<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckConfiguration
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
        $nbr = DB::table('users')->count();
        if($nbr < 1)
        {
            return redirect('/installation');
        }
<<<<<<< HEAD
        return $next($request);

=======
        if (Auth::guard(null)->check()) {
//            return redirect('/');
//            die($request);
            return $next($request);

        }
>>>>>>> 0d4279e290f7da84f242b09682b016d9f6f70347
    }
}
