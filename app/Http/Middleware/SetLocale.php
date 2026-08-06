<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has('locale')) {

            $browser = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);

            if (in_array($browser, ['en', 'fr'])) {
                Session::put('locale', $browser);
            } else {
                Session::put('locale', config('app.locale'));
            }
        }

        App::setLocale(Session::get('locale'));

        return $next($request);
    }
}
