<?php

namespace App\Model;

use App\Model\Model as Model;

final class GameModel extends Model{
    public $game_id;
    public $game_nome;
    public $game_descricao;
    public $game_nome_arquivos;
    public $game_diretorio_raiz;
    public $game_logo;
    public $game_icone;
    public $game_sobreposicao_cenario;
    public $game_status;
    public $game_email;
    public $game_telefone;
    public $game_created_at;
    public $game_updated_at;
    public $paleta_cor_id;
    public $niveis;

    /**
     * @param $game_nome
     * @param $game_descricao
     * @param $game_nome_arquivos
     * @param $game_diretorio_raiz
     * @param $game_status
     * @param $game_email
     * @param $game_telefone
     */
    public function __construct($game_nome, $game_descricao, $game_nome_arquivos='', $game_diretorio_raiz='', $game_status='', $game_email='', $game_telefone='', $paleta_cor_id)
    {
        $this->setGameNome($game_nome);
        $this->setGameDescricao($game_descricao);
        $this->setGameNomeArquivos($game_nome_arquivos);
        $this->setGameDiretorioRaiz($game_diretorio_raiz);
        $this->setGameStatus($game_status);
        $this->setGameEmail($game_email);
        $this->setGameTelefone($game_telefone);
        $this->setPaletaCorId($paleta_cor_id);
    }

    /**
     * @return int
     */
    public function getGameId(): int
    {
        return $this->game_id;
    }

    /**
     * @param mixed $game_id
     */
    public function setGameId($game_id): void
    {
        $this->game_id = $game_id;
    }

    /**
     * @return String
     */
    public function getGameNome(): String
    {
        return $this->game_nome;
    }

    /**
     * @param String $game_nome
     */
    public function setGameNome($game_nome): void
    {
        $this->game_nome = $game_nome;
    }

    /**
     * @return String
     */
    public function getGameDescricao(): String
    {
        return $this->game_descricao;
    }

    /**
     * @param String $game_descricao
     */
    public function setGameDescricao($game_descricao): void
    {
        $this->game_descricao = $game_descricao;
    }

    /**
     * @return String
     */
    public function getGameNomeArquivos(): String
    {
        return $this->game_nome_arquivos;
    }

    /**
     * @param String $game_nome_arquivos
     */
    public function setGameNomeArquivos($game_nome_arquivos): void
    {
        $this->game_nome_arquivos = $game_nome_arquivos;
    }

    /**
     * @return String
     */
    public function getGameDiretorioRaiz(): String
    {
        return $this->game_diretorio_raiz;
    }

    /**
     * @param String $game_diretorio_raiz
     */
    public function setGameDiretorioRaiz($game_diretorio_raiz): void
    {
        $this->game_diretorio_raiz = $game_diretorio_raiz;
    }

    /**
     * @return String
     */
    public function getGameLogo(): String
    {
        return $this->game_logo;
    }

    /**
     * @param String $game_logo
     */
    public function setGameLogo($game_logo): void
    {
        $this->game_logo = $game_logo;
    }

    /**
     * @return String
     */
    public function getGameIcone(): String
    {
        return $this->game_icone;
    }

    /**
     * @param String $game_icone
     */
    public function setGameIcone($game_icone): void
    {
        $this->game_icone = $game_icone;
    }

    /**
     * @return String
     */
    public function getGameSobreposicaoCenario(): String
    {
        return $this->game_sobreposicao_cenario;
    }

    /**
     * @param String $game_sobreposicao_cenario
     */
    public function setGameSobreposicaoCenario($game_sobreposicao_cenario): void
    {
        $this->game_sobreposicao_cenario = $game_sobreposicao_cenario;
    }

    /**
     * @return String
     */
    public function getGameStatus(): String
    {
        return $this->game_status;
    }

    /**
     * @param String $game_status
     */
    public function setGameStatus($game_status): void
    {
        $this->game_status = $game_status;
    }

    /**
     * @return String
     */
    public function getGameEmail(): String
    {
        return $this->game_email;
    }

    /**
     * @param String $game_email
     */
    public function setGameEmail($game_email): void
    {
        $this->game_email = $game_email;
    }

    /**
     * @return String
     */
    public function getGameTelefone(): String
    {
        return $this->game_telefone;
    }

    /**
     * @param String $game_telefone
     */
    public function setGameTelefone($game_telefone): void
    {
        $this->game_telefone = $game_telefone;
    }

    /**
     * @return mixed
     */
    public function getGameCreatedAt()
    {
        return $this->game_created_at;
    }

    /**
     * @param mixed $game_created_at
     */
    public function setGameCreatedAt($game_created_at): void
    {
        $this->game_created_at = $game_created_at;
    }

    /**
     * @return mixed
     */
    public function getGameUpdatedAt()
    {
        return $this->game_updated_at;
    }

    /**
     * @param mixed $game_updated_at
     */
    public function setGameUpdatedAt($game_updated_at): void
    {
        $this->game_updated_at = $game_updated_at;
    }

    /**
     * @return mixed
     */
    public function getPaletaCorId()
    {
        return $this->paleta_cor_id;
    }

    /**
     * @param mixed $paleta_cor_id
     */
    public function setPaletaCorId($paleta_cor_id): void
    {
        $this->paleta_cor_id = $paleta_cor_id;
    }

    /**
     * @return mixed
     */
    public function getNiveis()
    {
        return $this->niveis;
    }

    /**
     * @param mixed $niveis
     */
    public function setNiveis($niveis): void
    {
        $this->niveis = $niveis;
    }
}