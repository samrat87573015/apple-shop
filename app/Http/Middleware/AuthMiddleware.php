<?php

namespace App\Http\Middleware;

use App\Helper\ResponsHelper;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Helper\JWTTokan;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $loginTokan = $request->cookie('LoginToken');

        $result = JWTTokan::decodeTokan($loginTokan);

        //return $result;



        if($result=="unauthorized"){
            return redirect('/login');
           
        }
        else{
            $request->headers->set('email', $result->email);
            $request->headers->set('id', $result->id);
            return $next($request);
        }



    }
}
