<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Statut
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
    if ( $this->auth->user()->statut == "Admin" || $this->auth->user()->statut == "Moderateur")
        {
                
        }
        else
        {
            if ($request->ajax())
                {
                        return response('Non autorisé.', 401);
                }
                else
                {
                        $request->session()->flash('error', "Vous n'avez pas les droits nécessaire: vous devez être administrateur ou modérateur !");    
                        return back();
                       
                }
                
        }
return $next($request);
    
    }
}
