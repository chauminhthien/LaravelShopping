<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AdminLoginMiddleware
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
        

        if(Auth::check()){
            if(Auth::user()->quyen == 1){
                return $next($request);
            }else{
                return redirect('admin/dang-nhap.html');
            }
        }else{
            return redirect('admin/dang-nhap.html');
        }
    }
}
