<?php

namespace App\Http\Middleware;

use Closure;

class Login
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
        if(session("admin_id")==null){
            echo "<script>alert('请先登陆');location.href='/login/log';</script>";
        }
        return $next($request);
    }
}
