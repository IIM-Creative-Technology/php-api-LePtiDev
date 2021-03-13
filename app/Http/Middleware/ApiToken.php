<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class ApiToken
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
        $api_token = $request->headers->get('api-token');

        $user = User::where("api_token", "=", $api_token)->get()->first();

        if(!$user instanceof User){
            return response()->json('Non autorisé', 401);
        }

        return $next($request);
    }
}
