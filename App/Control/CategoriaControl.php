<?php

namespace App\Control;

use App\Model\Categoria;
use App\Services\HttpResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CategoriaControl extends Control
{
    public function buscar_categorias(Request $request, Response $response, array $args){
        return $this->encapsular_response(function ($request, $response, $args){
            $categoria = new Categoria();

            $dados = $categoria->getAll();

            if($dados){
                return HttpResponse::status200($dados);
            }

            return HttpResponse::status500();
        }, $request, $response, $args);
    }
}