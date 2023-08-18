<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class Verify2FA
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
        // Not authenticated => no need to check
        $notAuthInfo = !Auth::check();
        if (!Auth::check()) {
            return $next($request);
        }

        // 2FA not enabled => no need to check
        $secret = Auth::user()->twofa_secret;
        if (!$secret) {
            return $next($request);
        }

        // 2FA is already checked
        $sss = session("2fa_checked", false);
        if ($sss) {
            return $next($request);
        }

        // at this point user must provide a valid OTP
        // but we must avoid an infinite loop
        $islogin= request()->is('login/otp');
        if ($islogin) {
            return $next($request);
        }

        return redirect(action("App\Http\Controllers\OTPController@show"));
    }
}