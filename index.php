<?php
require 'app/base/Router.php';

$router = new Router([
    '/' => ['Home', 'index'],
    '/home' => ['Home', 'index'],
    '/backup' => ['Home', 'backup'],
    '/dev' => ['Home', 'development'],

    '/jogos/listar' => ['Jogos', 'list'],
    '/jogos/cadastrar' => ['Jogos', 'create'],

    '/filmes/listar' => ['Filmes', 'list'],
    '/filmes/cadastrar' => ['Filmes', 'create'],

    '/projetos/listar' => ['Projetos', 'list'],
    '/projetos/editar' => ['Projetos', 'edit'],
    '/projetos/cadastrar' => ['Projetos', 'create'],

    '/tarefas/editar' => ['Tarefas', 'edit'],
    '/tarefas/cadastrar' => ['Tarefas', 'create'],
    '/tarefas/concluir' => ['Tarefas', 'conclude'],
    '/tarefas/calendario' => ['Tarefas', 'calendar'],

    '/animes/atuais' => ['Animes', 'list_current'],
    '/animes/ocultos' => ['Animes', 'list_hidden'],
    '/animes/pendentes' => ['Animes', 'list_pending'],
    '/animes/concluidos' => ['Animes', 'list_concluded'],
    '/animes/suspender' => ['Animes', 'set_pending'],
    '/animes/ocultar' => ['Animes', 'set_hidden'],
    '/animes/concluir' => ['Animes', 'conclude'],
    '/animes/renovar' => ['Animes', 'renew'],
    '/animes/cadastrar' => ['Animes', 'create'],
]);
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->handle_request($url);
?>
