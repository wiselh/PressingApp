<?php

namespace App\Http\Middleware;

use Closure;
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
        if($nbr<1)
        {
//            die('nooo');
            return redirect('/startup');

        }


        return $next($request);
    }
}