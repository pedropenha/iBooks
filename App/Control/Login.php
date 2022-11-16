<?php

namespace App\Control;

use App\Model\PessoaFisica;
use App\Services\HttpResponse;
use App\Services\UtilValidator;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class Login extends Control
{
    public function login(Request $request, Response $response, array $args)
    {
        $this->encapsular_response(function ($request, $response, $args){
            $arrayValido = ['cpf', 'senha'];
            $dados = $request->getParsedBody();

            if(!UtilValidator::validar_campos_obrigatorios($dados, $arrayValido))
                return HttpResponse::status400();

            $pf = new PessoaFisica();

            $logado = $pf->login($dados['cpf'], $dados['senha']);

            if(!$logado)
                return HttpResponse::status404();

            return HttpResponse::status200($logado);
        }, $request, $response, $args);
    }
}