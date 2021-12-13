<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcessoEmpresa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        $nivel = auth()->user()->nivel;
        if($nivel < 2){
            return redirect()->route('index')->with('error', 'Você não tem acesso a esta página');
        }
        
        return $next($request);
    }
}
