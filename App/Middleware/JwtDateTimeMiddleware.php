<?php

namespace App\Middleware;

use Slim\Psr7\Response as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handler;
use \Tuupola\Middleware\JwtAuthentication;
use Firebase\JWT\JWT;

final class JwtDateTimeMiddleware {

    public function __invoke(Request $request, Handler $handler){
        $response = new Response();
        $token = $request->getAttribute('jwt');
        $vencimento = new \DateTime($token['vencimento']);
        $agora = new \DateTime();
        if($vencimento < $agora){
            return $response->withStatus(401);
        }
        return $handler->handle($request);
   }
}