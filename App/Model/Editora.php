<?php

namespace App\Model;

use App\DAO\EditoraDAO;

final class Editora
{
    private $ideditoras;
    private $nome_editora;

    /**
     * @param $ideditoras
     * @param $nome_editora
     */
    public function __construct($ideditoras, $nome_editora)
    {
        $this->ideditoras = $ideditoras;
        $this->nome_editora = $nome_editora;
    }

    /**
     * @return mixed
     */
    public function getIdeditoras()
    {
        return $this->ideditoras;
    }

    /**
     * @param mixed $ideditoras
     */
    public function setIdeditoras($ideditoras): void
    {
        $this->ideditoras = $ideditoras;
    }

    /**
     * @return mixed
     */
    public function getNomeEditora()
    {
        return $this->nome_editora;
    }

    /**
     * @param mixed $nome_editora
     */
    public function setNomeEditora($nome_editora): void
    {
        $this->nome_editora = $nome_editora;
    }


}