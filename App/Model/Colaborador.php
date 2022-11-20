<?php

namespace App\Model;

class Colaborador
{
    private $id_colaborador;
    private $id_pessoa_fisica;
    private $matricula_colaborador;

    /**
     * @param $id_colaborador
     * @param $id_pessoa_fisica
     * @param $matricula_colaborador
     */
    public function __construct($id_colaborador, $id_pessoa_fisica, $matricula_colaborador)
    {
        $this->id_colaborador = $id_colaborador;
        $this->id_pessoa_fisica = $id_pessoa_fisica;
        $this->matricula_colaborador = $matricula_colaborador;
    }

    /**
     * @return mixed
     */
    public function getIdColaborador()
    {
        return $this->id_colaborador;
    }

    /**
     * @param mixed $id_colaborador
     */
    public function setIdColaborador($id_colaborador): void
    {
        $this->id_colaborador = $id_colaborador;
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
    public function setIdPessoaFisica($id_pessoa_fisica): void
    {
        $this->id_pessoa_fisica = $id_pessoa_fisica;
    }

    /**
     * @return mixed
     */
    public function getMatriculaColaborador()
    {
        return $this->matricula_colaborador;
    }

    /**
     * @param mixed $matricula_colaborador
     */
    public function setMatriculaColaborador($matricula_colaborador): void
    {
        $this->matricula_colaborador = $matricula_colaborador;
    }
}