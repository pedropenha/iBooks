<?php

namespace App\Control;

use App\Model\BaixaDeLivro;
use App\Model\Exemplar;
use App\Services\HttpResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class BaixaDeLivroControl extends Control
{
    public function baixa_livro(Request $request, Response $response, array $args)
    {
        return $this->encapsular_response(function ($request, $response, $args){
            $data = $request->getParsedBody();

            $baixa_livro = new BaixaDeLivro($data['exemplar_id'], $data['colaborador_id'], $data['motivo_baixa'], $data['data_baixa']);

            if(!$baixa_livro->save($baixa_livro))
                return HttpResponse::status500();

            if(!Exemplar::darBaixaLivro($data['exemplar_id']))
                return HttpResponse::status500();

            return HttpResponse::status200('Livro dado baixa com sucesso');
        }, $request, $response, $args);
    }

}