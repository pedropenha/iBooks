<?php

namespace App\DAO;

use App\Model\GameModel;

final class GameDAO extends Conexao{
    public function __construct(){
        parent::__construct();
    }

    public function inserir_game(GameModel $game): int | null
    {
        $sql = "INSERT INTO GAME (game_nome, game_descricao, game_nome_arquivos, game_diretorio_raiz, game_status, paleta_cor_id) values (?,?,?,?,?,?)";
        $result = $this->conexao->prepare($sql);

        if($result->execute([$game->getGameNome(), $game->getGameDescricao(), $game->getGameNomeArquivos(), $game->getGameDiretorioRaiz(), $game->getGameStatus(), $game->getPaletaCorId()]))
            return $this->conexao->lastInsertId();

        return null;
    }

    public function inserir_imagens_game($id, $game_logo, $game_icone, $game_cenario, $game_sobreposicao_cenario): bool
    {
        $sql = "UPDATE GAME SET game_logo = ?, game_icone = ?, game_cenario = ?, game_sobreposicao_cenario = ? WHERE game_id = ?";
        $result = $this->conexao->prepare($sql);

        return $result->execute([$game_logo, $game_icone, $game_cenario, $game_sobreposicao_cenario, $id]);
    }

    public function atualizar_game(GameModel $game): bool
    {
        $sql = "UPDATE GAME SET game_nome = ?, game_descricao = ?, game_nome_arquivos = ?, game_diretorio_raiz = ?, game_status = ?, paleta_cor_id = ? WHERE id = ?";

        $result = $this->conexao->prepare($sql);

        if($result->execute([$game->getGameNome(), $game->getGameDescricao(), $game->getGameNomeArquivos(), $game->getGameDiretorioRaiz(), $game->getGameStatus(), $game->getPaletaCorId()]))
            return $this->conexao->lastInsertId();

        return false;
    }

    public function buscar_imagens_game($id): array | bool
    {
        $sql = "SELECT game_logo, game_icone, game_sobreposicao_cenario FROM GAME WHERE game_id = ?";
        $result = $this->conexao->prepare($sql);

        $result->execute([$id]);

        if($result->rowCount() > 0)
            return $result->fetchAll(\PDO::FETCH_OBJ);

        return false;

    }

    public function atualizar_imagens_game($logo, $icone, $cenario, $sobreposicao, $id): bool
    {

        $sql = "UPDATE GAME SET game_logo = ?, game_icone = ?, game_cenario = ?, game_sobreposicao_cenario = ? WHERE game_id = ?";
        $result = $this->conexao->prepare($sql);

        return $result->execute([$logo, $icone, $cenario, $sobreposicao, $id]);
    }

    public function finalizar_game($status, $id){
        $sql = "UPDATE GAME SET game_status = ? WHERE game_id = ?";

        $result = $this->conexao->prepare($sql);

        return $result->execute([$status, $id]);
    }

    public function buscar_todos(): array
    {

        $lista = null;
        $sql = "SELECT game_id, game_nome, game_descricao, created_at, updated_at FROM GAME WHERE game_status = 0";
        $result = $this->conexao->prepare($sql);
        $result->execute();

        if($result->rowCount() > 0){
            $lista = [];
            foreach ($result->fetchAll(\PDO::FETCH_OBJ) as $item){
                $obj = new GameModel($item->game_nome, $item->game_descricao);
                $obj->setGameId($item->game_id);
                $obj->setGameCreatedAt($item->game_created_at);
                $obj->setGameUpdatedAt($item->game_updated_at);

                $obj->getNewObject(['id', 'game_nome', 'game_descricao', 'created_at', 'updated_at']);

                array_push($lista, $obj);
            }
        }

        return $lista;
    }

    public function buscar_por_id($id){

        $sql = "SELECT * FROM GAME WHERE game_id = ?";
        $result = $this->conexao->prepare($sql);

        $result->execute([$id]);

        if($result->rowCount() > 0){
            return $result->fetchAll(\PDO::FETCH_OBJ);
        }

        return null;
    }

    public function buscar_todas_infos_do_game($id): array | null
    {
        $sql = "SELECT * FROM GAME WHERE game_id = ?";
        $result = $this->conexao->prepare($sql);
        $result->execute([$id]);

        if($result->rowCount() == 0)
            return null;

        $game = $result->fetchAll(\PDO::FETCH_OBJ);
        $niveis = [];
        $fases = [];

        $sql = "SELECT * FROM NIVEL WHERE game_id = ?";
        $result = $this->conexao->prepare($sql);
        $result->execute([$id]);

        if($result->rowCount() == 0)
            return null;

        foreach ($result->fetchAll(\PDO::FETCH_OBJ) as $item){

            array_push($niveis, $item);

            $sql = "SELECT * FROM FASE WHERE nivel_id = ?";
            $result = $this->conexao->prepare($sql);
            $result->execute([$item->nivel_id]);

            if($result->rowCount() > 0){
                foreach ($result->fetchAll(\PDO::FETCH_OBJ) as $itemFase){
                    array_push($fases, $itemFase);
                }
            }
        }

        if(sizeof($niveis) > 0 && sizeof($fases) > 0 && sizeof($game) > 0)
            return ['game' => $game, 'niveis' => $niveis, 'fases' => $fases];

        return null;
    }

    public function buscar_por_titulo(String $titulo): array | null
    {
        $sql = "SELECT * FROM GAME WHERE game_nome = ?";
        $result = $this->conexao->prepare($sql);
        $result->execute([$titulo]);

        if($result->rowCount() > 0)
            return $result->fetchAll(\PDO::FETCH_OBJ);

        return null;
    }

    public function buscar_diretorio(String $id): \stdClass | null
    {
        $sql = "SELECT game_diretorio_raiz FROM GAME WHERE game_id = ?";
        $result = $this->conexao->prepare($sql);
        $result->execute([$id]);

        if($result->rowCount() > 0)
            return $result->fetch(\PDO::FETCH_OBJ);

        return null;
    }
}
