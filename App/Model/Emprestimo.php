<?php

namespace App\Model;

use App\DAO\EmprestimoDAO;

class Emprestimo
{
    private $id_emprestimo;
    private $id_cliente;
    private $id_colaborador;
    private $id_exemplar;
    private $data_emprestimo;

    /**
     * @param $id_emprestimo
     * @param $id_cliente
     * @param $id_colaborador
     * @param $id_exemplar
     * @param $data_emprestimo
     */
    public function __construct($id_emprestimo='', $id_cliente='', $id_colaborador='', $id_exemplar='', $data_emprestimo='')
    {
        $this->id_emprestimo = $id_emprestimo;
        $this->id_cliente = $id_cliente;
        $this->id_colaborador = $id_colaborador;
        $this->id_exemplar = $id_exemplar;
        $this->data_emprestimo = $data_emprestimo;
    }

    /**
     * @return mixed
     */
    public function getIdEmprestimo()
    {
        return $this->id_emprestimo;
    }

    /**
     * @param mixed $id_emprestimo
     */
    public function setIdEmprestimo($id_emprestimo): void
    {
        $this->id_emprestimo = $id_emprestimo;
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
    public function setIdCliente($id_cliente): void
    {
        $this->id_cliente = $id_cliente;
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
    public function getIdExemplar()
    {
        return $this->id_exemplar;
    }

    /**
     * @param mixed $id_exemplar
     */
    public function setIdExemplar($id_exemplar): void
    {
        $this->id_exemplar = $id_exemplar;
    }

    /**
     * @return mixed
     */
    public function getDataEmprestimo()
    {
        return $this->data_emprestimo;
    }

    /**
     * @param mixed $data_emprestimo
     */
    public function setDataEmprestimo($data_emprestimo): void
    {
        $this->data_emprestimo = $data_emprestimo;
    }

    public static function save(Emprestimo $emprestimo){
        return EmprestimoDAO::save($emprestimo);
    }

    public static function exemplarJaEmprestado(Emprestimo $emprestimo){
        return EmprestimoDAO::exemplarJaEmprestado($emprestimo);
    }
}