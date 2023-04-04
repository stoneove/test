<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class isVendorVerifyEmail
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
        if(!Auth::guard('vendor')->user()->email_verified){
            Auth::guard('vendor')->logout();
            return redirect(
                'vendor/login'
            )->with('fail','You need to confirm your account. We have to send you a activation link. Please check your email')->withinput();
            


        }
        return $next($request);
    }
}
