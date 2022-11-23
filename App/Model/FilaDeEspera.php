<?php

namespace App\Model;

use App\DAO\ExemplarDAO;
use App\DAO\FilaDeESperaDAO;

final class FilaDeEspera
{
    private $id;
    private $id_exemplar;
    private $id_pessoa_fisica;

    /**
     * @param $id_exemplar
     * @param $id_pessoa_fisica
     */
    public function __construct($id_exemplar, $id_pessoa_fisica)
    {
        $this->id_exemplar = $id_exemplar;
        $this->id_pessoa_fisica = $id_pessoa_fisica;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
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

    public static function getAll()
    {
        return FilaDeESperaDAO::getAll();
    }

    public static function getById($id)
    {
        return FilaDeESperaDAO::getOne($id);
    }

    public static function save(FilaDeEspera $filaDeEspera)
    {
        return FilaDeESperaDAO::save($filaDeEspera);
    }

    public static function update(FilaDeESpera $filaDeEspera)
    {
        return FilaDeESperaDAO::update($filaDeEspera);
    }

    public static function delete($id)
    {
        return FilaDeESperaDAO::delete($id);
    }


}