<?php

namespace App\Controller;

use App\DAO\FaseDAO;
use App\DAO\GameDAO;
use App\DAO\NivelDAO;
use App\Model\FaseModel;
use App\Model\GameModel;
use App\Model\NivelModel;
use App\Services\HttpResponse;
use App\Services\PHP_ICO;
use App\Services\UtilFiles;
use App\Services\UtilValidator;
use App\Services\UtilValidatorFiles;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class GameController extends Controller {

    public function inserir_game(Request $request, Response $response, array $args){
        return $this->encapsular_response(function ($request, $response, $args){
            $formValido = ['game_nome', 'game_descricao', 'game_dominio', 'game_nome_arquivos', 'game_status', 'id_paleta'];

            $gameDAO = new GameDAO();

            $data = $request->getParsedBody()['config'];

            if(!UtilValidator::validar_formulario($data, $formValido))
                return HttpResponse::status400();

            if($gameDAO->buscar_por_titulo($data['game_nome']) != null)
                return HttpResponse::status400('Um novo game não pode possuir o mesmo titulo de outro game.');

            $diretorio = strtolower(preg_replace('/\s+/', '-', $data['game_nome']) . '-' . time());

            $game = new GameModel($data['game_nome'], $data['game_descricao'], $data['game_nome_arquivos'], $diretorio, 0, '',
                '', $data['id_paleta']);

            if($gameDAO->inserir_game($game))
                return HttpResponse::status200();

            return HttpResponse::status500();

        }, $request, $response, $args);
    }

    public function inserir_imagens_game(Request $request, Response $response, array $args){
        return $this->encapsular_response(function ($request, $response, $args){
            $formValido = ['game_logo', 'game_icone', 'game_cenario', 'game_sobreposicao_cenario'];

            $images = $request->getUploadedFiles();
            $data = $request->getParsedBody();

            $gameDAO = new GameDAO();

            if(!UtilValidator::validar_formulario(array_merge($data, $images), $formValido))
                return HttpResponse::status400();

            if(!UtilValidatorFiles::valida_extensao_arquivo($images['game_logo'], ['png', 'svg']))
                return HttpResponse::status400('O arquivo de icone enviado não é válido.');

            if(!UtilValidatorFiles::valida_extensao_arquivo($images['game_icone'], ['png']))
                return HttpResponse::status400('O arquivo de icone enviado não é válido.');

            if(!UtilValidatorFiles::valida_extensao_arquivo($images['game_cenario'], ['png', 'svg']))
                return HttpResponse::status400('O arquivo de icone enviado não é válido.');

            if(!UtilValidatorFiles::valida_extensao_arquivo($images['game_sobreposicao_cenario'], ['png', 'svg']))
                return HttpResponse::status400('O arquivo de icone enviado não é válido.');

            $diretorio = $gameDAO->buscar_diretorio($data['id']);

            $diretorio = DIR_REPOSITORIO_IMAGENS . DIRECTORY_SEPARATOR . $diretorio->diretorio_raiz;

            if(!UtilValidatorFiles::diretorio_existe($diretorio))
                if(!UtilFiles::cria_diretorio($diretorio))
                    return HttpResponse::status400('Não foi possivel criar o diretorio.');

            $files = [];

            foreach ($images as $key => $item){
                $filename = md5($key);

                $file = UtilFiles::cria_imagem_base_64($item);

                $file = UtilFiles::salvar_imagem_base64($file, $diretorio, $filename);

                if(!$file)
                    return HttpResponse::status500('Erro ao salvar imagem na pasta.');

                $files += [$key => $file];
            }

            $gameDAO = new GameDAO();

            $diretorio = $diretorio . DIRECTORY_SEPARATOR . 'icons' . DIRECTORY_SEPARATOR;

            if(!UtilValidatorFiles::diretorio_existe($diretorio))
                if(!UtilFiles::cria_diretorio($diretorio))
                    return HttpResponse::status500();

            UtilFiles::resizeImage($files['icone'], $diretorio . 'icon-linux-256x256.png', 256, 256);

            $ico = new PHP_ICO($files['icone'], array( array( 16, 16 ), array( 32, 32 ), array(48, 48), array(64, 64), array(128, 128), array(256, 256) ) );
            $ico->save_ico($diretorio . 'icon-windows-multi-size.ico');

            $ico = new PHP_ICO($files['icone'], array( array( 16, 16 ) ) );
            $ico->save_ico($diretorio . 'favicon.ico');

            if($gameDAO->inserir_imagens_game($data['id'], $files['game_logo'], 'icons', $files['game_cenario'], $files['game_sobreposicao_cenario']))
                return HttpResponse::status200();

            return HttpResponse::status500();

        }, $request, $response, $args);
    }

    public function editar_game(Request $request, Response $response, array $args){
        return $this->encapsular_response(function ($request, $response, $args){
            $formValido = ['id', 'game_nome', 'game_descricao', 'game_dominio', 'game_nome_arquivos', 'game_status', 'id_paleta'];

            $gameDAO = new GameDAO();

            $data = $request->getParsedBody()['config'];

            if(!UtilValidator::validar_formulario($data, $formValido))
                return HttpResponse::status400();

            if(!UtilValidator::validar_campos_obrigatorios($data, $formValido))
                return HttpResponse::status400();

            if($gameDAO->buscar_por_titulo($data['game_nome']) != null)
                return HttpResponse::status400('Um novo game não pode possuir o mesmo titulo de outro game.');

            $diretorio = $gameDAO->buscar_diretorio($data['id']);

            $game = new GameModel($data['game_nome'], $data['game_descricao'], $data['game_nome_arquivos'], $diretorio, 0, '',
                '', $data['id_paleta']);

            if($gameDAO->atualizar_game($game))
                return HttpResponse::status200('Game editado com sucesso.');

            return HttpResponse::status500();

        }, $request, $response, $args);
    }

    public function editar_imagens_game(Request $request, Response $response, array $args){
        return $this->encapsular_response(function ($request, $response, $args){
            $formValido = ['logo', 'icone', 'cenario'];
            $extensoes = ['jpg', 'jpeg', 'png', 'svg'];

            $images = $request->getUploadedFiles();
            $data = $request->getParsedBody();

            $gameDAO = new GameDAO();

            if(!UtilValidator::validar_formulario($images, $formValido))
                return HttpResponse::status400();

            if(!UtilValidator::validar_formulario($data, ['id']))
                return HttpResponse::status400();

            if(!UtilValidatorFiles::valida_extensao_arquivo($images['icone'], ['png', 'jpg']))
                return HttpResponse::status400('O arquivo de icone enviado não é válido, envie um arquivo .png');

            if(!UtilValidatorFiles::valida_extensao_arquivo($images['logo'], ['png']))
                return HttpResponse::status400('O arquivo de logo enviado não é válido, envie um arquivo .png');

            if(!UtilValidatorFiles::valida_extensao_arquivo($images['cenario'], $extensoes))
                return HttpResponse::status400('O arquivo de cenario enviado não é válido.');

            if(!UtilValidatorFiles::valida_se_tamanho_arquivo_maior_zero($images['icone']))
                return HttpResponse::status400('Arquivo vazio, envie um arquivo com conteudo.');

            if(!UtilValidatorFiles::valida_se_tamanho_arquivo_maior_zero($images['logo']))
                return HttpResponse::status400('Arquivo vazio, envie um arquivo com conteudo.');

            if(!UtilValidatorFiles::valida_se_tamanho_arquivo_maior_zero($images['cenario']))
                return HttpResponse::status400('Arquivo vazio, envie um arquivo com conteudo.');

            $diretorio = $gameDAO->buscar_diretorio($data['id']);

            $diretorio = DIR_REPOSITORIO_IMAGENS . DIRECTORY_SEPARATOR . $diretorio->diretorio_raiz;

            if(!UtilValidatorFiles::diretorio_existe($diretorio))
                if(!UtilFiles::cria_diretorio($diretorio))
                    return HttpResponse::status400('Não foi possivel criar o diretorio.');

            $arquivosBD = $gameDAO->buscar_imagens_game($data['id'])[0];

            $oldNameImages = [
                'logo' => UtilFiles::traz_nome_imagem($arquivosBD->logoGame),
                'icone' => UtilFiles::traz_nome_imagem($arquivosBD->imgIconeGame),
                'favicon' => UtilFiles::traz_nome_imagem($arquivosBD->imgFavicon),
                'cenario' => UtilFiles::traz_nome_imagem($arquivosBD->cenarioGame)
            ];

            $files = [];

            foreach ($images as $key => $item){
                $fileName = md5($key);
                foreach ($oldNameImages as $keyName => $name){
                    if($keyName == $key){
                        if(!empty($name))
                            $fileName = $name;
                    }
                }

                $file = UtilFiles::cria_imagem_base_64($item);

                $file = UtilFiles::salvar_imagem_base64($file, $diretorio, $fileName);

                if(!$file)
                    return HttpResponse::status500('Erro ao salvar imagem na pasta.');


                $files += [$key => $file];

            }

            $ico = UtilFiles::salvar_imagem_ico($files['logo'], $diretorio, $oldNameImages['favicon']);

            if(!$ico)
                return HttpResponse::status500('Erro ao gerar .ico');

            if($gameDAO->atualizar_imagens_game($files['logo'], $ico, $files['cenario'], $files['icone'], $data['id']))
                return HttpResponse::status200();

            return HttpResponse::status500();
        }, $request, $response, $args);
    }

    public function finalizar_game(Request $request, Response $response, array $args){
        return $this->encapsular_response(function ($request, $response, $args){
            $gameDAO = new GameDAO();
            $data = $request->getParsedBody();

            if(!UtilValidator::validar_formulario($data, ['id']))
                return HttpResponse::status400();

            $game = $gameDAO->buscar_todas_infos_do_game($data['id']);

            if($game == [])
                return HttpResponse::status404('Game não encontrado ou ja gerado.');

            if(!UtilValidator::campos_vazios_game($game))
                return HttpResponse::status500('Nao foi possivel finalizar o game, pois alguma informacao ainda nao foi preenchida.');

            if($gameDAO->finalizar_game(1, $data['id']))
                return HttpResponse::status200('Game finalizado com sucesso.');

            return HttpResponse::status500();

        }, $request, $response, $args);
    } // funcao nao finalizada

    public function buscar_todos_games(Request $request, Response $response, array $args){

        return $this->encapsular_response(function($request, $response, $args){

            $gameDAO = new GameDAO();

            $games = $gameDAO->buscar_todos();

            if($gameDAO->buscar_todos() != null)
                return HttpResponse::status200($games);

            return HttpResponse::status500();

        }, $request, $response, $args);

    }

    public function buscar_game_por_id(Request $request, Response $response, array $args){
        return $this->encapsular_response(function ($request, $response, $args){

            $gameDAO = new GameDAO();
            $nivelDAO = new NivelDAO();
            $fasesDAO = new FaseDAO();
            $niveis = [];

            $game = $gameDAO->buscar_por_id($args['id']);

            if($game == null){
                return HttpResponse::status404();
            }

            $game = $game[0];

            $gameModel = new GameModel($game->game_nome, $game->game_descricao, $game->game_nome_arquivos, $game->game_diretorio_raiz, $game->game_status, $game->game_email,
                $game->game_telefone, $game->paleta_cor_id);

            $gameModel->setGameId($game->game_id);
            $gameModel->setGameCreatedAt($game->game_created_at);
            $gameModel->setGameUpdatedAt($game->game_updated_at);

            if($nivelDAO->buscar_por_idGame($gameModel->getGameId()) != null){
                foreach ($nivelDAO->buscar_por_idGame($gameModel->getGameId()) as $itemNivel){
                    $nivelAux = new NivelModel($itemNivel->nivel_nome, $itemNivel->nivel_descricao, $itemNivel->nivel_cenario, $itemNivel->game_id);
                    $nivelAux->setNivelId($itemNivel->nivel_id);
                    $nivelAux->setNivelCreatedAt($itemNivel->nivel_created_at);
                    $nivelAux->setNivelUpdatedAt($itemNivel->nivel_updated_at);

                    array_push($niveis, $nivelAux);
                }
            }

            $gameModel->setNiveis($niveis);

            if(sizeof($gameModel->getNiveis()) > 0){
                foreach ($gameModel->getNiveis() as $itemNiveis){
                    $itemNiveis->setFases($fasesDAO->buscar_fase_por_idNivel($itemNiveis->getId()));
                }
            }

            return HttpResponse::status200($gameModel);

        }, $request, $response, $args);
    }

    public function duplicar_game(Request $request, Response $response, array $args)// em stand by
    {
        return $this->encapsular_response(function ($request, $response, $args){
            $camposObrigatoriosDiferentes = ['id', 'titulo', 'dominio', 'diretorio'];

            $data = $request->getParsedBody();

            if(!UtilValidator::validar_formulario($data, $camposObrigatoriosDiferentes))
                return HttpResponse::status400();

            if(!UtilValidator::validar_campos_obrigatorios($data, $camposObrigatoriosDiferentes))
                return HttpResponse::status400();

            if(!UtilValidator::validar_dominio($data['dominio']))
                return HttpResponse::status400('Este dominio não é um dominio válido');

            $gameDAO = new GameDAO();
            $nivelDAO = new NivelDAO();
            $faseDAO = new FaseDAO();

            if($gameDAO->buscar_por_titulo($data['titulo']))
                return HttpResponse::status400('Um game não pode ter o mesmo nome de outro game');

            if($gameDAO->buscar_por_dominio($data['dominio']))
                return HttpResponse::status400('Um game não pode ter o mesmo dominio de outro game');

            $game = $gameDAO->buscar_todas_infos_do_game($data['id']);

            if($game == null)
                return HttpResponse::status500();

            $diretorio = strtolower(preg_replace('/\s+/', '-', $data['titulo']) . '-' . $data['diretorio']);

            $gameDup = new GameModel($data['titulo'], $game['game'][0]->descricaoGame, $data['dominio'],
            $diretorio, 0, $game['game'][0]->nomeArquivos, $game['game'][0]->emailContato,
            $game['game'][0]->telefoneContato, $game['game'][0]->corFundo, $game['game'][0]->corFundoFase,
                $game['game'][0]->bordaFase, $game['game'][0]->corTexto, $game['game'][0]->logoGame,
            $game['game'][0]->imgFavicon, $game['game'][0]->imgIconeGame, $game['game'][0]->cenarioGame);

           $gameIdDup = $gameDAO->inserir_game($gameDup);
           $gameDAO->inserir_imagens_game($gameIdDup, $gameDup->getLogo(), $gameDup->getIcone(),
           $gameDup->getCenario(), $gameDup->getFavicon());

           $dir_path = DIR_REPOSITORIO_IMAGENS . DIRECTORY_SEPARATOR . $diretorio;

           if(!UtilValidatorFiles::diretorio_existe($dir_path))
               if(!UtilFiles::cria_diretorio($dir_path))
                   return HttpResponse::status500();

            if($gameIdDup != null){
                foreach ($game['niveis'] as $item){
                    $filename = UtilFiles::traz_nome_imagem($item->cenario);
                    $cenario = UtilFiles::copia_arquivo_para_outro_diretorio($item->cenario, $dir_path, $filename);
                    $nivel = new NivelModel($item->titulo, $item->descricao, $cenario, $gameIdDup);
                    $nivel = $nivelDAO->inserir_nivel($nivel);
                    foreach ($game['fases'] as $fase){
                        if($fase->idNivel == $item->id){
                            $filename = UtilFiles::traz_nome_imagem($fase->icone);
                            $icone = UtilFiles::copia_arquivo_para_outro_diretorio($fase->icone, $dir_path, $filename);
                            $faseModel = new FaseModel($fase->titulo, $fase->arquivo, $icone, $nivel);
                            $faseDAO->inserir_fase($faseModel);
                        }
                    }
                }

                return HttpResponse::status200();
            }

            return HttpResponse::status500();


        }, $request, $response, $args);
    }
}