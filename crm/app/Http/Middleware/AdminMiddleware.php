<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Verifica se o usuário está autenticado e é um administrador
        if (Auth::check() && Auth::user()->admin == 1) {
            return $next($request);
        }

        // Redireciona para uma página não autorizada
        return redirect('/cadastro');
    }
}
