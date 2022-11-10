<?php

use Slim\Exception\HttpNotFoundException;

use Slim\App;

// Game

// Route group example
$app->group('/game-setup-webservice/games', function (\Slim\Routing\RouteCollectorProxy $group) {

    $group->get('/', \App\Controller\GameController::class.':buscar_todos_games');

    $group->get('/{id}', \App\Controller\GameController::class.':buscar_game_por_id');

    $group->get('/totalRegistros/', \App\Controller\GameController::class.':total_de_registros');

    $group->post('/', \App\Controller\GameController::class.':inserir_game');

    $group->post('/editar', \App\Controller\GameController::class.':editar_game');

    $group->post('/imagens', \App\Controller\GameController::class.':editar_imagens_game');

    $group->post('/finalizarGame', \App\Controller\GameController::class.':finalizar_game');

    $group->post('/duplicar', \App\Controller\GameController::class.':duplicar_game');

    $group->post('/imagem', \App\Controller\GameController::class.':inserir_imagens_game');

    $group->post('/aula', \App\Controller\GameController::class.':aula_zip');

});

$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
    throw new HttpNotFoundException($request);
});