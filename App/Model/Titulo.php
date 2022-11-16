<?php

namespace App\Model;

use App\DAO\TituloDAO;

final class Titulo
{
    private $idtitulo;
    private $nome_titulo;
    private $qtde_paginas_titulo;
    private $idiomas_ididiomas;


    public function __construct($idtitulo = "", $nome_titulo = "", $qtde_paginas_titulo = "", $idiomas_ididiomas = "")
    {
        $this->idtitulo = $idtitulo;
        $this->nome_titulo = $nome_titulo;
        $this->qtde_paginas_titulo = $qtde_paginas_titulo;
        $this->idiomas_ididiomas = $idiomas_ididiomas;
    }

    /**
     * @return mixed|string
     */
    public function getIdtitulo(): mixed
    {
        return $this->idtitulo;
    }

    /**
     * @param mixed|string $idtitulo
     */
    public function setIdtitulo(mixed $idtitulo): void
    {
        $this->idtitulo = $idtitulo;
    }

    /**
     * @return mixed|string
     */
    public function getNomeTitulo(): mixed
    {
        return $this->nome_titulo;
    }

    /**
     * @param mixed|string $nome_titulo
     */
    public function setNomeTitulo(mixed $nome_titulo): void
    {
        $this->nome_titulo = $nome_titulo;
    }

    /**
     * @return mixed|string
     */
    public function getQtdePaginasTitulo(): mixed
    {
        return $this->qtde_paginas_titulo;
    }

    /**
     * @param mixed|string $qtde_paginas_titulo
     */
    public function setQtdePaginasTitulo(mixed $qtde_paginas_titulo): void
    {
        $this->qtde_paginas_titulo = $qtde_paginas_titulo;
    }

    /**
     * @return mixed|string
     */
    public function getIdiomasIdidiomas(): mixed
    {
        return $this->idiomas_ididiomas;
    }

    /**
     * @param mixed|string $idiomas_ididiomas
     */
    public function setIdiomasIdidiomas(mixed $idiomas_ididiomas): void
    {
        $this->idiomas_ididiomas = $idiomas_ididiomas;
    }

    /**
     * @param $idtitulo
     * @param $nome_titulo
     * @param $qtde_paginas_titulo
     * @param $idiomas_ididiomas
     */


}