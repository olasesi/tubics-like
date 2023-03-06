<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Cookie;

class RegistrationCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(Cookie::get('youtube_channel') && Cookie::get('business_email') && Cookie::get('business_description')){
            
            $confirm_row = User::where('active', 0)->where('active_stage1', 1)->where('business_email', Cookie::get('business_email'))->count();
            if($confirm_row == 1){
                return $next($request);
            }else{
                return redirect(route('user.create'));
            }
            
        }else{
            return redirect(route('user.create'));
        }

        return $next($request);
    }
}
