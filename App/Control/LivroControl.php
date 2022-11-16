<?php

namespace App\Control;

use App\Model\Exemplar;
use App\Services\HttpResponse;
use App\Services\UtilValidator;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class LivroControl extends Control
{

    public function inserir_livro(Request $request, Response $response, array $args){
        return $this->encapsular_response(function ($request, $response, $args){
            $campos_obrigatorios = ['numero_de_serie', 'ISBN-10', 'ISBN-13', 'editoras_ideditoras', 'titulo_idtitulo', 'status'];

            $data = $request->getParsedBody();
            if(!UtilValidator::validar_campos_obrigatorios($data, $campos_obrigatorios))
                return HttpResponse::status401();

            $livro = new Livro($data['numero_de_serie'], $data['ISBN-10'], $data['ISBN13'], $data['editoras_ideditoras'], $data['titulo_idtitulo'], $data['status']);
            if($livro->save($livro))
                return HttpResponse::status200();

            return HttpResponse::status500();
        }, $request, $response, $args);
    }

    public function buscar_livros(Request $request, Response $response, array $args){
        return $this->encapsular_response(function ($request, $response, $args){
            $livro = new Livro();
            $dados = $livro->getAll();
            if($dados)
                return HttpResponse::status200($dados);

            return HttpResponse::status500();

        }, $request, $response, $args);
    }

    public function buscar_livro(Request $request, Response $response, array $args){
        return $this->encapsular_response(function ($request, $response, $args){
            $campos_obrigatorios = ['idexemplar'];
            $data = $request->getParsedBody();

            if(!UtilValidator::validar_campos_obrigatorios($data, $campos_obrigatorios))
                return HttpResponse::status401();

            $livro = new Livro();

            $dados = $livro->getOne($data['idexemplar']);

            if($dados)
                return HttpResponse::status200($dados);

            return HttpResponse::status404();

        }, $request, $response, $args);
    }

    public function editar_livro(Request $request, Response $response, array $args){
        return $this->encapsular_response(function ($request, $response, $args){
            $campos_obrigatorios = ['idexemplar', 'numero_de_serie', 'ISBN-10', 'ISBN-13', 'editoras-ideditoras', 'titulo_idtitulo', 'status'];

            $data = $request->getParsedBody();
            if(!UtilValidator::validar_campos_obrigatorios($data, $campos_obrigatorios))
                return HttpResponse::status401();

            $livro = new Livro($data['numero_de_serie'], $data['ISBN-10'], $data['ISBN-13'], $data['editoras-ideditoras'], $data['titulo_idtitulo'], $data['status']);
            $livro->setIdLivro($data['idexemplar']);
            if($livro->update($livro))
                return HttpResponse::status200();

            return HttpResponse::status500();
        }, $request, $response, $args);
    }

    public function delete_livro(Request $request, Response $response, array $args){
        return $this->encapsular_response(function ($request, $response, $args){
            $data = $request->getParsedBody();

            if(!UtilValidator::validar_campos_obrigatorios($data, ['idexemplar']))
                return HttpResponse::status401();

            $livro = new Livro();

            $retorno = $livro->delete($data['idexemplar']);
            if(!$retorno)
                return HttpResponse::status500();

            return HttpResponse::status200();
        }, $request, $response, $args);
    }
}