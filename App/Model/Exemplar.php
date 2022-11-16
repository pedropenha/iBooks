<?php

namespace App\Model;

use App\DAO\ExemplarDAO;

final class Exemplar
{
    private $idexemplar;
    private $numero_de_serie;
    private $ISBN_10;
    private $ISBN_13;
    private $editoras_ideditoras;
    private $titulo_idtitulo;
    private $status;

    /**
     * @param $idexemplar
     * @param $numero_de_serie
     * @param $ISBN_10
     * @param $ISBN_13
     * @param $editoras_ideditoras
     * @param $titulo_idtitulo
     * @param $status
     */
    public function __construct($idexemplar, $numero_de_serie, $ISBN_10, $ISBN_13, $editoras_ideditoras, $titulo_idtitulo, $status)
    {
        $this->idexemplar = $idexemplar;
        $this->numero_de_serie = $numero_de_serie;
        $this->ISBN_10 = $ISBN_10;
        $this->ISBN_13 = $ISBN_13;
        $this->editoras_ideditoras = $editoras_ideditoras;
        $this->titulo_idtitulo = $titulo_idtitulo;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getIdexemplar()
    {
        return $this->idexemplar;
    }

    /**
     * @param mixed $idexemplar
     */
    public function setIdexemplar($idexemplar): void
    {
        $this->idexemplar = $idexemplar;
    }

    /**
     * @return mixed
     */
    public function getNumeroDeSerie()
    {
        return $this->numero_de_serie;
    }

    /**
     * @param mixed $numero_de_serie
     */
    public function setNumeroDeSerie($numero_de_serie): void
    {
        $this->numero_de_serie = $numero_de_serie;
    }

    /**
     * @return mixed
     */
    public function getISBN10()
    {
        return $this->ISBN_10;
    }

    /**
     * @param mixed $ISBN_10
     */
    public function setISBN10($ISBN_10): void
    {
        $this->ISBN_10 = $ISBN_10;
    }

    /**
     * @return mixed
     */
    public function getISBN13()
    {
        return $this->ISBN_13;
    }

    /**
     * @param mixed $ISBN_13
     */
    public function setISBN13($ISBN_13): void
    {
        $this->ISBN_13 = $ISBN_13;
    }

    /**
     * @return mixed
     */
    public function getEditorasIdeditoras()
    {
        return $this->editoras_ideditoras;
    }

    /**
     * @param mixed $editoras_ideditoras
     */
    public function setEditorasIdeditoras($editoras_ideditoras): void
    {
        $this->editoras_ideditoras = $editoras_ideditoras;
    }

    /**
     * @return mixed
     */
    public function getTituloIdtitulo()
    {
        return $this->titulo_idtitulo;
    }

    /**
     * @param mixed $titulo_idtitulo
     */
    public function setTituloIdtitulo($titulo_idtitulo): void
    {
        $this->titulo_idtitulo = $titulo_idtitulo;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }


}