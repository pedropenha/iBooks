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
    private $nivel;


    /**
     * @param $nome
     * @param $cpf
     * @param $dtNasc
     * @param $senha
     */
    public function __construct($nome = '', $cpf = '', $dtNasc = '', $senha = '', $nivel = '')
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->dtNasc = $dtNasc;
        $this->senha = $senha;
        $this->nivel = $nivel;

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
    public function setIdPessoaFisica($idPessoaFisica)
    {
        $this->idPessoaFisica = $idPessoaFisica;
    }

    /**
     * @return mixed|string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed|string $nome
     */
    public function setNome(mixed $nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed|string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed|string $cpf
     */
    public function setCpf(mixed $cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed|string
     */
    public function getDtNasc()
    {
        return $this->dtNasc;
    }

    /**
     * @param mixed|string $dtNasc
     */
    public function setDtNasc(mixed $dtNasc)
    {
        $this->dtNasc = $dtNasc;
    }

    /**
     * @return mixed|string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed|string $senha
     */
    public function setSenha(mixed $senha)
    {
        $this->senha = $senha;
    }

    /**
     * @return mixed|string
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * @param mixed|string $nivel
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    }

    public static function login($cpf, $senha)
    {
        return PessoaFisicaDAO::login($cpf, $senha);
    }
        public static function save(PessoaFisica $fisica)
    {
        return PessoaFisicaDAO::save($fisica);
    }
}