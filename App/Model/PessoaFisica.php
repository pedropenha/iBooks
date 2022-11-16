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
     * @param $idPessoaFisica
     * @param $nome
     * @param $cpf
     * @param $dtNasc
     * @param $senha
     */
    public function __construct($nome = '', $cpf = '', $dtNasc = '', $senha = '')
    {
        $this->setNome($nome);
        $this->setCpf($cpf);
        $this->setDtNasc($dtNasc);
        $this->setSenha($senha);
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
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf): void
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getDtNasc()
    {
        return $this->dtNasc;
    }

    /**
     * @param mixed $dtNasc
     */
    public function setDtNasc($dtNasc): void
    {
        $this->dtNasc = $dtNasc;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha): void
    {
        $this->senha = $senha;
    }

    public function getAll(): bool | array
    {
        return PessoaFisicaDAO::getAll();
    }

    public function getById($id): bool | array
    {
        return PessoaFisicaDAO::getById($id);
    }

    public function save(PessoaFisica $pessoaFisica): bool
    {
        return PessoaFisicaDAO::save($pessoaFisica);
    }

    public function update(PessoaFisica $pessoaFisica): mixed
    {
        return PessoaFisicaDAO::update($pessoaFisica);
    }

    public function delete($id): bool
    {
        return PessoaFisicaDAO::delete($id);
    }

    public function login($cpf, $senha): bool | array
    {
        return PessoaFisicaDAO::login($cpf, $senha);
    }
}