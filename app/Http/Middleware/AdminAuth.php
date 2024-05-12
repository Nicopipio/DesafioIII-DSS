<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
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

        // Verifica si hay un usuario autenticado
        if(auth()->check()){
            

            // Verifica si el usuario tiene el rol de 'admin'
            if(auth()->user()->role == 'admin'){

                // Si es un admin, pasa la solicitud al siguiente middleware
                return $next($request);
            }
            
        }

            // Si no hay usuario autenticado o el usuario no es admin, redirige al inicio
            return redirect()->to('/');
    }
}
