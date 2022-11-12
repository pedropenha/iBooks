<?php

namespace App\Model;

use App\DAO\PatrimonioDAO;

final class Patrimonio
{
    private $idPatrimonio;
    private $nome_patrimonio;
    private $valor_patrimonio;
    private $data_aquisicao;
    private $categoria;
    private $numero_patrimonio;
    private $imagem;

    /**
     * @param $idPatrimonio
     * @param $nome_patrimonio
     * @param $valor_patrimonio
     * @param $data_aquisicao
     * @param $categoria
     * @param $numero_patrimonio
     */
    public function __construct($nome_patrimonio='', $valor_patrimonio='', $data_aquisicao='', $categoria='', $numero_patrimonio='', $imagem='')
    {
        $this->setNomePatrimonio($nome_patrimonio);
        $this->setValorPatrimonio($valor_patrimonio);
        $this->setDataAquisicao($data_aquisicao);
        $this->setCategoria($categoria);
        $this->setNumeroPatrimonio($numero_patrimonio);
        $this->setImagem($imagem);
    }

    /**
     * @return mixed
     */
    public function getIdPatrimonio()
    {
        return $this->idPatrimonio;
    }

    /**
     * @param mixed $idPatrimonio
     */
    public function setIdPatrimonio($idPatrimonio): void
    {
        $this->idPatrimonio = $idPatrimonio;
    }

    /**
     * @return mixed
     */
    public function getNomePatrimonio()
    {
        return $this->nome_patrimonio;
    }

    /**
     * @param mixed $nome_patrimonio
     */
    public function setNomePatrimonio($nome_patrimonio): void
    {
        $this->nome_patrimonio = $nome_patrimonio;
    }

    /**
     * @return mixed
     */
    public function getValorPatrimonio()
    {
        return $this->valor_patrimonio;
    }

    /**
     * @param mixed $valor_patrimonio
     */
    public function setValorPatrimonio($valor_patrimonio): void
    {
        $this->valor_patrimonio = $valor_patrimonio;
    }

    /**
     * @return mixed
     */
    public function getDataAquisicao()
    {
        return $this->data_aquisicao;
    }

    /**
     * @param mixed $data_aquisicao
     */
    public function setDataAquisicao($data_aquisicao): void
    {
        $this->data_aquisicao = $data_aquisicao;
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria): void
    {
        $this->categoria = $categoria;
    }

    /**
     * @return mixed
     */
    public function getNumeroPatrimonio()
    {
        return $this->numero_patrimonio;
    }

    /**
     * @param mixed $numero_patrimonio
     */
    public function setNumeroPatrimonio($numero_patrimonio): void
    {
        $this->numero_patrimonio = $numero_patrimonio;
    }

    /**
     * @return mixed
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * @param mixed $imagem
     */
    public function setImagem($imagem): void
    {
        $this->imagem = $imagem;
    }

    public function getAll(): bool | array
    {
        return PatrimonioDAO::getAll();
    }

    public function getOne($id): bool | array
    {
        return PatrimonioDAO::getOne($id);
    }

    public function save(Patrimonio $patrimonio): bool
    {
        return PatrimonioDAO::save($patrimonio);
    }

    public function update(Patrimonio $patrimonio): mixed
    {
        return PatrimonioDAO::update($patrimonio);
    }

    public function delete($id): bool
    {
        return PatrimonioDAO::delete($id);
    }
}