<?php

namespace App\Control;

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
            $livro = new Livro();
            $dados = $livro->getAll();
            if ($dados)
                return HttpResponse::status200($dados);

            return HttpResponse::status404();

        }, $request, $response, $args);
    }

    public function buscar_livro(Request $request, Response $response, array $args)
    {
        return $this->encapsular_response(function ($request, $response, $args) {
            $campos_obrigatorios = ['idexemplar'];
            $data = $request->getParsedBody();

            if (!UtilValidator::validar_campos_obrigatorios($data, $campos_obrigatorios))
                return HttpResponse::status401();

            $livro = new Livro();

            $dados = $livro->getOne($data['idexemplar']);

            if ($dados)
                return HttpResponse::status200($dados);

            return HttpResponse::status404();

        }, $request, $response, $args);
    }

    public function inserir_livro(Request $request, Response $response, array $args)
    {
        return $this->encapsular_response(function ($request, $response, $args) {
            $campos_obrigatorios = ['id_idioma', 'id_editora', 'nome_titulo', 'paginas_titulo', 'num_serie', 'isbn_10', 'isbn_13'];

            $data = $request->getParsedBody();

            if (!UtilValidator::validar_campos_obrigatorios($data, $campos_obrigatorios))
                return HttpResponse::status401();

            $titulo = new Titulo('', $data['nome_titulo'], $data['paginas_titulo'], $data['id_idioma']);

            $titulo = $titulo::save($titulo);

            if (!$titulo)
                return HttpResponse::status500();

            $exemplar = new Exemplar('', $data['num_serie'], $data['isbn_10'], $data['isbn_13'], 0, $data['id_editora'], $titulo);

            $exemplar = $exemplar::save($exemplar);

            if (!$exemplar)
                return HttpResponse::status500();

            return HttpResponse::status200('deu certo essa porra');
        }, $request, $response, $args);
    }

}