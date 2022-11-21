<?php

namespace App\Model;

use App\DAO\PessoaFisicaDAO;

final class PessoaFisica
{
    private $idPessoaFisica;
    private $nome;
    private $cpf;
    private $dtNasc;
    private $senha;

    /**
     * @param $nome
     * @param $cpf
     * @param $dtNasc
     * @param $senha
     */
    public function __construct($nome = '', $cpf = '', $dtNasc = '', $senha = '')
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->dtNasc = $dtNasc;
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getIdPessoaFisica()
    {
        return $this->idPessoaFisica;
    }

    /**
     * @param mixed $idPessoaFisica
     */
    public function setIdPessoaFisica($idPessoaFisica): void
    {
        $this->idPessoaFisica = $idPessoaFisica;
    }

    /**
     * @return mixed|string
     */
    public function getNome(): mixed
    {
        return $this->nome;
    }

    /**
     * @param mixed|string $nome
     */
    public function setNome(mixed $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed|string
     */
    public function getCpf(): mixed
    {
        return $this->cpf;
    }

    /**
     * @param mixed|string $cpf
     */
    public function setCpf(mixed $cpf): void
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed|string
     */
    public function getDtNasc(): mixed
    {
        return $this->dtNasc;
    }

    /**
     * @param mixed|string $dtNasc
     */
    public function setDtNasc(mixed $dtNasc): void
    {
        $this->dtNasc = $dtNasc;
    }

    /**
     * @return mixed|string
     */
    public function getSenha(): mixed
    {
        return $this->senha;
    }

    /**
     * @param mixed|string $senha
     */
    public function setSenha(mixed $senha): void
    {
        $this->senha = $senha;
    }

    public static function login($cpf, $senha)
    {
        return PessoaFisicaDAO::login($cpf, $senha);
    }
}