<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAge
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
        // if($request->age > 18){
        //     echo "Welcome <br>";

        //     return $next($request);
        // }else{
        //     return redirect()->route("users.all");
        // }
         
        echo "Welcome <br>";
        return $next($request);
    }

    public function terminate($request, $response)
    {
        echo "<br>Good Bye";
    }
}
