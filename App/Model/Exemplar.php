<?php

namespace App\Model;

use App\DAO\ExemplarDAO;

final class Exemplar
{
    private $id;
    private $num_serie;
    private $isbn_10;
    private $isbn_13;
    private $status;
    private $id_editora;
    private $id_titulo;
    private $id_idioma;

    /**
     * @param $id
     * @param $num_serie
     * @param $isbn_10
     * @param $isbn_13
     * @param $status
     * @param $id_editora
     * @param $id_titulo
     * @param $id_idioma
     */
    public function __construct($id = '', $num_serie = '', $isbn_10 = '', $isbn_13 = '', $status = '', $id_editora = '', $id_titulo = '', $id_idioma= '')
    {
        $this->id = $id;
        $this->num_serie = $num_serie;
        $this->isbn_10 = $isbn_10;
        $this->isbn_13 = $isbn_13;
        $this->status = $status;
        $this->id_editora = $id_editora;
        $this->id_titulo = $id_titulo;
        $this->id_idioma = $id_idioma;
    }

    /**
     * @return mixed|string
     */
    public function getIdIdioma(): mixed
    {
        return $this->id_idioma;
    }

    /**
     * @param mixed|string $id_idioma
     */
    public function setIdIdioma(mixed $id_idioma): void
    {
        $this->id_idioma = $id_idioma;
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
    public function getNumSerie()
    {
        return $this->num_serie;
    }

    /**
     * @param mixed $num_serie
     */
    public function setNumSerie($num_serie): void
    {
        $this->num_serie = $num_serie;
    }

    /**
     * @return mixed
     */
    public function getIsbn10()
    {
        return $this->isbn_10;
    }

    /**
     * @param mixed $isbn_10
     */
    public function setIsbn10($isbn_10): void
    {
        $this->isbn_10 = $isbn_10;
    }

    /**
     * @return mixed
     */
    public function getIsbn13()
    {
        return $this->isbn_13;
    }

    /**
     * @param mixed $isbn_13
     */
    public function setIsbn13($isbn_13): void
    {
        $this->isbn_13 = $isbn_13;
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

    /**
     * @return mixed
     */
    public function getIdEditora()
    {
        return $this->id_editora;
    }

    /**
     * @param mixed $id_editora
     */
    public function setIdEditora($id_editora): void
    {
        $this->id_editora = $id_editora;
    }

    /**
     * @return mixed
     */
    public function getIdTitulo()
    {
        return $this->id_titulo;
    }

    /**
     * @param mixed $id_titulo
     */
    public function setIdTitulo($id_titulo): void
    {
        $this->id_titulo = $id_titulo;
    }




    public static function getAll()
    {
        return ExemplarDAO::getAll();
    }

    public static function getById($id)
    {
        return ExemplarDAO::getOne($id);
    }

    public static function save(Exemplar $exemplar)
    {
        return ExemplarDAO::save($exemplar);
    }

    public static function update(Exemplar $exemplar)
    {
        return ExemplarDAO::update($exemplar);
    }

    public static function delete($id)
    {
        return ExemplarDAO::delete($id);
    }

    public static function darBaixaLivro($id_exemplar)
    {
        return ExemplarDAO::baixaExemplar($id_exemplar);
    }


}