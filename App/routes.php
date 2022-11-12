<?php

use Slim\Exception\HttpNotFoundException;

use Slim\App;

// Game

// Route group example
$app->group('/iBooks/patrimonio', function (\Slim\Routing\RouteCollectorProxy $group) {

    $group->get('/', \App\Control\PatrimonioControl::class.':buscar_patrimonios');

    $group->get('/{id}', \App\Control\PatrimonioControl::class.':buscar_patrimonio');

    $group->post('/', \App\Control\PatrimonioControl::class.':inserir_patrimonio');

    $group->post('/editar', \App\Control\PatrimonioControl::class.':editar_patrimonio');

    $group->post('/delete', \App\Control\PatrimonioControl::class.':delete_patrimonio');

});

$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
    throw new HttpNotFoundException($request);
});