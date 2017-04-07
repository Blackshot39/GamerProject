<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Admin
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
    if (Auth::user()->id != $poste->user->id || Auth::user()->statut != "Admin" || Auth::user()->statut != "Moderateur")
        {
                if ($request->ajax())
                {
                        return response('Unauthorized.', 401);
                }
                else
                {
                        $request->session()->flash('error', "Vous n'avez pas les droits nécessaire: vous devez être administrateur !");                         return back();
                       
                }
        }

    return $next($request);
    }
}
