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
        if(array_key_exists('key', $request->all()))
            session(['key' => $request->all()['key']]);
        if(session('key')==9898694){
            return $next($request);
        }else{
            return redirect()->action('BlogController@index');
        }
    }
}
