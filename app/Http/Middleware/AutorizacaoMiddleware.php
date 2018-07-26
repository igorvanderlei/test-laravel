<?php

namespace OrgTabajara\Http\Middleware;

use Closure;

class AutorizacaoMiddleware
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
    	//$request->route()->uri <- retorna a rota
    	if($request->is("funcionario/create")) {
    		if(\Auth::guest() || \Auth::user()->departamento->descricao != "rh")
    			return redirect("login");
    	}
      
      return $next($request);
    }
}
