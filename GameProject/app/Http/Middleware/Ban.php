<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class Ban
{
    protected $auth;

    public function __construct(Guard $authenti)
    {
            $this->auth = $authenti;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check())
        {
    if ( $this->auth->user()->ban == true )       
        {
         Auth::logout();
            if ($request->ajax())
                {
                   
                        return response('Vous êtes banni.', 401);
                }
                else
                {
                    
                        $request->session()->flash('error', "Vous êtes banni.");    
                        return redirect(route('login'));
                       
                }
                
    }
    
                }
return $next($request);
    
    }
}
