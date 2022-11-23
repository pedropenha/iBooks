<?php

namespace App\Control;

use App\Model\FilaDeEspera;
use App\Model\Exemplar;
use App\Model\PessoaFisica;
use App\Services\HttpResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class FilaDeESperaControl extends Control
{
    public function entrar_fila(Request $request, Response $response, array $args)
    {
        return $this->encapsular_response(callback: function ($request, $response, $args){
            $data = $request->getParsedBody();

            $filaDeEspera = new FilaDeEspera($data['id_exemplar'], $data['id_pessoa_fisica']);

            $filaDeEspera = $filaDeEspera::save($filaDeEspera);

            if(!$filaDeEspera)
                return HttpResponse::status500();


            return HttpResponse::status200('Entrou na fila de espera');
        }, request: $request, response: $response, args: $args);
    }

}