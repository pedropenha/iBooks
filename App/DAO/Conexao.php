<?php

namespace App\DAO;

abstract class Conexao{
    
    protected $conexao;

    public function __construct(){
        $endereco = getenv('ENDERECO_BANCO');
        $porta = getenv('PORTA_BANCO');
        $usuario = getenv('USUARIO_BANCO');
        $senha = getenv('SENHA_BANCO');
        $banco = getenv('NOME_BANCO');

        $dsn = "mysql:host={$endereco};dbname={$banco};port={$porta}";

        $this->conexao = new \PDO($dsn, $usuario, $senha);
        $this->conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
}