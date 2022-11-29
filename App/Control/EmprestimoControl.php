<?php

namespace App\Control;

use App\DAO\EmprestimoDAO;
use App\Model\Emprestimo;
use App\Model\Exemplar;
use App\Services\HttpResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class EmprestimoControl extends Control
{
    public function emprestar_livro(Request $request, Response $response, array $args){
        return $this->encapsular_response(function ($request, $response, $args){

            $data = $request->getParsedBody();

            $emp = new Emprestimo('', $data['id_cliente'], $data['id_colaborador'], $data['id_exemplar']);

            if(Emprestimo::exemplarJaEmprestado($emp))
                return HttpResponse::status400("Exemplar ja emprestado");

            if(Exemplar::podeEmprestar($data['id_exemplar']))
                return HttpResponse::status400('Exemplar com baixa ou ja emprestado');

            Emprestimo::save($emp);

            Exemplar::atualizaStatus($data['id_exemplar'], 2);

            return HttpResponse::status200('Exemplar emprestado com sucesso!');

        }, $request, $response, $args);
    }
}