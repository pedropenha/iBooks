<?php

namespace App\Model;

use App\DAO\ClienteDAO;

class Cliente
{
    private $id_cliente;
    private $id_pessoa_fisica;
    private $matricula;

    /**
     * @param $id_cliente
     * @param $id_pessoa_fisica
     * @param $matricula
     */
    public function __construct($id_cliente, $id_pessoa_fisica, $matricula)
    {
        $this->id_cliente = $id_cliente;
        $this->id_pessoa_fisica = $id_pessoa_fisica;
        $this->matricula = $matricula;
    }

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * @param mixed $id_cliente
     */
    public function setIdCliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }

    /**
     * @return mixed
     */
    public function getIdPessoaFisica()
    {
        return $this->id_pessoa_fisica;
    }

    /**
     * @param mixed $id_pessoa_fisica
     */
    public function setIdPessoaFisica($id_pessoa_fisica)
    {
        $this->id_pessoa_fisica = $id_pessoa_fisica;
    }

    /**
     * @return mixed
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * @param mixed $matricula
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }
    public static function save(Cliente $cliente)
    {
        return ClienteDAO::save($cliente);
    }
}