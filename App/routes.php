<?php


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

$app->group('/iBooks/categoria', function (\Slim\Routing\RouteCollectorProxy $group) {

    $group->get('/', \App\Control\CategoriaControl::class.':buscar_categorias');

});

$app->group('/iBooks/login', function (\Slim\Routing\RouteCollectorProxy $group) {
    $group->post('/', \App\Control\Login::class.':login');
});

$app->group('/iBooks/livro', function (\Slim\Routing\RouteCollectorProxy $group) {
    $group->get('/', \App\Control\LivroControl::class.':buscar_livros');

    $group->get('/idiomas', \App\Control\LivroControl::class.':buscar_idiomas');

    $group->get('/editoras', \App\Control\LivroControl::class.':buscar_editoras');

    $group->get('/{id}', \App\Control\LivroControl::class.':buscar_livro');

    $group->post('/', \App\Control\LivroControl::class.':inserir_livro');

    $group->post('/editar', \App\Control\LivroControl::class.':editar_livro');

    $group->post('/deletar', \App\Control\LivroControl::class.':deletar_livro');
});

$app->group('/iBooks/baixaLivro', function (\Slim\Routing\RouteCollectorProxy $group){
   $group->post('/', \App\Control\BaixaDeLivroControl::class.':baixa_livro');
});

$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
    throw new \Slim\Exception\HttpNotFoundException($request);
});

