<?php

namespace App\Control;

use App\Model\Editora;
use App\Model\Exemplar;
use App\Model\Idioma;
use App\Model\Livro;
use App\Model\Titulo;
use App\Services\HttpResponse;
use App\Services\UtilValidator;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class LivroControl extends Control
{
    public function buscar_livros(Request $request, Response $response, array $args)
    {
        return $this->encapsular_response(function ($request, $response, $args) {
            $dados = Livro::getAll();
            if ($dados)
                return HttpResponse::status200($dados);

            return HttpResponse::status404();

        }, $request, $response, $args);
    }

    public function buscar_livro(Request $request, Response $response, array $args)
    {
        return $this->encapsular_response(function ($request, $response, $args) {

            $data = $args['id'];

            $dados = Livro::getById($data);

            if ($dados)
                return HttpResponse::status200($dados);

            return HttpResponse::status404();

        }, $request, $response, $args);
    }

    public function inserir_livro(Request $request, Response $response, array $args)
    {
        return $this->encapsular_response(function ($request, $response, $args) {
            $campos_obrigatorios = ['id_idioma','num_serie', 'id_editora', 'nome_titulo', 'paginas_titulo', 'isbn_10', 'isbn_13'];

            $data = $request->getParsedBody();

//            if (!UtilValidator::validar_campos_obrigatorios($data, $campos_obrigatorios))
//                return HttpResponse::status401();

            $titulo = new Titulo('', $data['nome_titulo'], $data['paginas'], $data['idioma']);

            $titulo = $titulo::save($titulo);

            if (!$titulo)
                return HttpResponse::status500();

<<<<<<< HEAD
            $exemplar = new Exemplar('','', $data['isbn_10'], $data['isbn_13'], 0, $data['id_editora'], $titulo);
=======
            $exemplar = new Exemplar('','', $data['isbn10'], $data['isbn13'], 0, $data['editora'], $titulo);
>>>>>>> a96641b254ea9339bf41eb9964ea0567bac5fd97

            $exemplar = $exemplar::save($exemplar);

            if (!$exemplar)
                return HttpResponse::status500();

            return HttpResponse::status200();
        }, $request, $response, $args);
    }

    public function editar_livro(Request $request, Response $response, array $args) {
        return $this->encapsular_response(function ($request, $response, $args){
            $campos_obrigatorios = ['id_exemplar','id_idioma', 'id_editora', 'id_titulo', 'nome_titulo', 'paginas_titulo', 'isbn_10', 'isbn_13', 'status'];

            $data = $request->getParsedBody();

            $titulo = new Titulo($data['id_titulo'], $data['nome_titulo'], $data['paginas_titulo'], $data['id_idioma']);

            $titulo = $titulo::update($titulo);

            if (!$titulo)
                return HttpResponse::status500();

            $exemplar = new Exemplar($data['id_exemplar'], '', $data['isbn_10'], $data['isbn_13'],0, $data['id_editora'], $data['id_titulo']);

            $exemplar = $exemplar::update($exemplar);

            if (!$exemplar)
                return HttpResponse::status500();

            return  HttpResponse::status200('deu certo essa porra');
        }, $request, $response, $args);
    }

    public function deletar_livro(Request $request, Response $response, array $args) {
        return $this->encapsular_response(function ($request, $response, $args){
            $campos_obrigatorios = ['id_exemplar'];

            $data = $request->getParsedBody();

            $exemplar = new Exemplar();

            $exemplar = $exemplar::delete($data['id_exemplar']);

            if (!$exemplar)
                return HttpResponse::status500();

            return  HttpResponse::status200('deu certo essa porra');
        }, $request, $response, $args);
    }

    public function buscar_editoras(Request $request, Response $response, array $args)
    {
        return $this->encapsular_response(function ($request, $response, $args) {
            $dados = Editora::getAll();
            if ($dados)
                return HttpResponse::status200($dados);

            return HttpResponse::status404();

        }, $request, $response, $args);
    }

    public function buscar_idiomas(Request $request, Response $response, array $args)
    {
        return $this->encapsular_response(function ($request, $response, $args) {
            $dados = Idioma::getAll();
            if ($dados)
                return HttpResponse::status200($dados);

            return HttpResponse::status404();

        }, $request, $response, $args);
    }

    public function buscar_titulos(Request $request, Response $response, array $args)
    {
        return $this->encapsular_response(function ($request, $response, $args) {
            $dados = Titulo::getAll();
            if ($dados)
                return HttpResponse::status200($dados);

            return HttpResponse::status404();

        }, $request, $response, $args);
    }

}