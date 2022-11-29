<?php

namespace App\Control;

use App\Model\Administrador;
use App\Model\Cliente;
use App\Model\Colaborador;
use App\Model\PessoaFisica;
use App\Services\HttpResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class Login extends Control
{
    public function login(Request $request, Response $response, array $args)
    {
        return $this->encapsular_response(function ($request, $response, $args){
            $dados = $request->getParsedBody();

            $pf = new PessoaFisica();

            $logado = $pf::login($dados['cpf'], $dados['senha']);

            if(!$logado)
                return HttpResponse::status404();

            return HttpResponse::status200($logado);
        }, $request, $response, $args);
    }public function CadastroLogin(Request $request, Response $response, array $args)
    {
        return $this->encapsular_response(function ($request, $response, $args){
            $data = $request -> getParsedBody();
            $pf = new PessoaFisica($data["nome"],$data["cpf"], $data["dtNasc"], $data["senha"], $data["nivel"]);
            $pf = $pf::save($pf);
            if(!$pf)
                return HttpResponse::status500();
            if($data["nivel"] == 1 ){
                $colaborador = new Colaborador("", $pf, $data["matricula"]);
                $colaborador::save($colaborador);
            }
            if($data["nivel"] == 2)
            {
                $administrador = new Administrador("", $pf, $data["matricula"]);
                $administrador::save($administrador);
            }
            if($data["nivel"] == 0)
            {
                $cliente = new Cliente("", $pf, $data["matricula"]);
                $cliente::save($cliente);
            }
            return HttpResponse::status200();
        }, $request, $response, $args);
    }
}
