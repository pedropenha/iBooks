<?php

namespace App\Model;

use App\DAO\AdministradorDAO;

class Administrador
{
    private $id_administrador;
    private $id_pessoa_fisica;
    private $matricula;

    public function __construct($id_administrador, $id_pessoa_fisica, $matricula)
    {
        $this->id_administrador = $id_administrador;
        $this->id_pessoa_fisica = $id_pessoa_fisica;
        $this->matricula = $matricula; 
    }

    /**
     * @return mixed
     */
    public function getIdAdministrador()
    {
        return $this->id_administrador;
    }

    /**
     * @param mixed $id_administrador
     */
    public function setIdAdministrador($id_administrador)
    {
        $this->id_administrador = $id_administrador;
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
    public static function save(Administrador $administrador)
    {
        return AdministradorDAO::save($administrador);
    }


}