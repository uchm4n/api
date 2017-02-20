<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class Locale
{

    /**
     * The availables languages.
     *
     * @array $languages
     */
    protected $languages = ['en','ge'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //using cookies
        //if(!Cookie::has('locale')){
        //    cookie('locale',$request->getPreferredLanguage($this->languages),'4320');
        //}
        //app()->setLocale(Cookie::get('locale'));


        //using Sessions
        if(!Session::has('locale'))
        {
            Session::put('locale', $request->getPreferredLanguage($this->languages));
        }
        app()->setLocale(Session::get('locale'));

        //return $request->cookie();
        return $next($request);
    }
}
