<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->is_admin) 
            {
            // Se for admin, a requisição continua normalmente.
            return $next($request);
            }
        // Se não for admin, redireciona para a página inicial com uma mensagem de erro.
        return redirect('/')->with('error', 'You do not have admin access.');
    }
}
