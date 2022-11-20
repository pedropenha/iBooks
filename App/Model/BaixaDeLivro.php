<?php

namespace App\Model;

use App\DAO\BaixaDeLivroDAO;

class BaixaDeLivro
{
    private $id_baixa_livro;
    private $exemplar_id;
    private $colaborador_id;
    private $motivo_baixa;
    private $data_baixa;

    /**
     * @param $exemplar_id
     * @param $colaborador_id
     * @param $motivo_baixa
     * @param $data_baixa
     */
    public function __construct($exemplar_id = '', $colaborador_id = '', $motivo_baixa = '', $data_baixa = '')
    {
        $this->exemplar_id = $exemplar_id;
        $this->colaborador_id = $colaborador_id;
        $this->motivo_baixa = $motivo_baixa;
        $this->data_baixa = $data_baixa;
    }

    /**
     * @return mixed
     */
    public function getIdBaixaLivro()
    {
        return $this->id_baixa_livro;
    }

    /**
     * @param mixed $id_baixa_livro
     */
    public function setIdBaixaLivro($id_baixa_livro): void
    {
        $this->id_baixa_livro = $id_baixa_livro;
    }

    /**
     * @return mixed|string
     */
    public function getExemplarId(): mixed
    {
        return $this->exemplar_id;
    }

    /**
     * @param mixed|string $exemplar_id
     */
    public function setExemplarId(mixed $exemplar_id): void
    {
        $this->exemplar_id = $exemplar_id;
    }

    /**
     * @return mixed|string
     */
    public function getColaboradorId(): mixed
    {
        return $this->colaborador_id;
    }

    /**
     * @param mixed|string $colaborador_id
     */
    public function setColaboradorId(mixed $colaborador_id): void
    {
        $this->colaborador_id = $colaborador_id;
    }

    /**
     * @return mixed|string
     */
    public function getMotivoBaixa(): mixed
    {
        return $this->motivo_baixa;
    }

    /**
     * @param mixed|string $motivo_baixa
     */
    public function setMotivoBaixa(mixed $motivo_baixa): void
    {
        $this->motivo_baixa = $motivo_baixa;
    }

    /**
     * @return mixed|string
     */
    public function getDataBaixa(): mixed
    {
        return $this->data_baixa;
    }

    /**
     * @param mixed|string $data_baixa
     */
    public function setDataBaixa(mixed $data_baixa): void
    {
        $this->data_baixa = $data_baixa;
    }

    public function getAll(){
        return BaixaDeLivroDAO::getAll();
    }

    public function getById($id){
        return BaixaDeLivroDAO::getById($id);
    }

    public function save(BaixaDeLivro $baixaDeLivro){
        return BaixaDeLivroDAO::save($baixaDeLivro);
    }

    public function update(BaixaDeLivro $baixaDeLivro){
        return BaixaDeLivroDAO::update($baixaDeLivro);
    }

    public function delete($id){
        return BaixaDeLivroDAO::delete($id);
    }
}