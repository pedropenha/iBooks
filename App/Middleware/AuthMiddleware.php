<?php

namespace App\Middleware;

class AuthMiddleware {
    public function __invoke($request, $response, $next){
        /*$route = $request->getAttribute('route');
        $args = $route->getArguments();
        $idioma = $args['idioma'];

        //require 'config/idioma/'.$idioma.'.php';*/

        $response = $next($request, $response);
        return $response;
    }
}