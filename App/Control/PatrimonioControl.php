<?php

namespace App\Control;

use App\Model\Patrimonio;
use App\Services\HttpResponse;
use App\Services\UtilValidator;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class PatrimonioControl extends Control
{

    public function inserir_patrimonio(Request $request, Response $response, array $args){
        return $this->encapsular_response(function ($request, $response, $args){
            $campos_obrigatorios = ['nome', 'valor', 'data_compra', 'categoria', 'numero_patrimonio'];

            $data = $request->getParsedBody();
            if(!UtilValidator::validar_campos_obrigatorios($data, $campos_obrigatorios))
                return HttpResponse::status401();

            $patrimonio = new Patrimonio($data['nome'], $data['valor'], $data['data_compra'], $data['categoria'], $data['numero_patrimonio']);
            if($patrimonio->save($patrimonio))
                return HttpResponse::status200();

            return HttpResponse::status500();
        }, $request, $response, $args);
    }

    public function buscar_patrimonios(Request $request, Response $response, array $args){
        return $this->encapsular_response(function ($request, $response, $args){
            $patrimonio = new Patrimonio();
            $dados = $patrimonio->getAll();
            if($dados)
                return HttpResponse::status200($dados);

            return HttpResponse::status500();

        }, $request, $response, $args);
    }

    public function buscar_patrimonio(Request $request, Response $response, array $args){
        return $this->encapsular_response(function ($request, $response, $args){
            $campos_obrigatorios = ['idPatrimonio'];
            $data = $request->getParsedBody();

            if(!UtilValidator::validar_campos_obrigatorios($data, $campos_obrigatorios))
                return HttpResponse::status401();

            $patrimonio = new Patrimonio();

            $dados = $patrimonio->getOne($data['idPatrimonio']);

            if($dados)
                return HttpResponse::status200($dados);

            return HttpResponse::status404();

        }, $request, $response, $args);
    }

    public function editar_patrimonio(Request $request, Response $response, array $args){
        return $this->encapsular_response(function ($request, $response, $args){
            $campos_obrigatorios = ['idPatrimonio', 'nome', 'valor', 'data_compra', 'categoria', 'numero_patrimonio'];

            $data = $request->getParsedBody();
            if(!UtilValidator::validar_campos_obrigatorios($data, $campos_obrigatorios))
                return HttpResponse::status401();

            $patrimonio = new Patrimonio($data['nome'], $data['valor'], $data['data_compra'], $data['categoria'], $data['numero_patrimonio']);
            $patrimonio->setIdPatrimonio($data['idPatrimonio']);
            if($patrimonio->update($patrimonio))
                return HttpResponse::status200();

            return HttpResponse::status500();
        }, $request, $response, $args);
    }

    public function delete_patrimonio(Request $request, Response $response, array $args){
        return $this->encapsular_response(function ($request, $response, $args){
            $data = $request->getParsedBody();

            if(!UtilValidator::validar_campos_obrigatorios($data, ['idPatrimonio']))
                return HttpResponse::status401();

            $patrimonio = new Patrimonio();

            $retorno = $patrimonio->delete($data['idPatrimonio']);
            if(!$retorno)
                return HttpResponse::status500();

            return HttpResponse::status200();
        }, $request, $response, $args);
    }
}