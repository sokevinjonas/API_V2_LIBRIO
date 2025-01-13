<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckEmailValidated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        $user = Auth::user();

        if ($user && is_null($user->email_verified_at)) {
            // Si l'email n'est pas validé, redirige l'utilisateur avec un message
            return redirect()->route('landing.messageNonReception', ["user"=> $user->email])->with('error', 'Veuillez vérifier votre adresse email avant de continuer.');
        }
        
        return $next($request);
    }
}
