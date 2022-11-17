<?php

namespace App\Model;

use App\DAO\CategoriaDAO;

final class Categoria
{
    private $idCategoria;
    private $nomeCategoria;

    /**
     * @param $idCategoria
     * @param $nomeCategoria
     */
    public function __construct($idCategoria='', $nomeCategoria='')
    {
        $this->idCategoria = $idCategoria;
        $this->nomeCategoria = $nomeCategoria;
    }

    /**
     * @return mixed
     */
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * @param mixed $idCategoria
     */
    public function setIdCategoria($idCategoria): void
    {
        $this->idCategoria = $idCategoria;
    }

    /**
     * @return mixed
     */
    public function getNomeCategoria()
    {
        return $this->nomeCategoria;
    }

    /**
     * @param mixed $nomeCategoria
     */
    public function setNomeCategoria($nomeCategoria): void
    {
        $this->nomeCategoria = $nomeCategoria;
    }

    public function getAll(): bool | array
    {
        return CategoriaDAO::getAll();
    }

    public function getOne($id): bool | array
    {
        return CategoriaDAO::getOne($id);
    }

    public function save(Patrimonio $patrimonio): bool
    {
        return CategoriaDAO::save($patrimonio);
    }

    public function update(Patrimonio $patrimonio): mixed
    {
        return CategoriaDAO::update($patrimonio);
    }

    public function delete($id): bool
    {
        return CategoriaDAO::delete($id);
    }
}