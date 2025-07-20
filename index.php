<?php
require 'app/base/Router.php';

$file = '.env';
if (file_exists($file)) {
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        if (strpos(trim($line), '=') === false) {
            continue;
        }
        list($k, $v) = explode('=', $line, 2);
        $k = trim($k, " \"");
        $v = trim($v, " \"");
        putenv("$k=$v");
    }
}

$router = new Router([
    '/' => ['Home', 'index'],
    '/home' => ['Home', 'index'],
    '/backup' => ['Home', 'backup'],
    '/dev' => ['Home', 'development'],

    '/jogos/listar' => ['Jogos', 'list'],
    '/jogos/cadastrar' => ['Jogos', 'create'],

    '/filmes/listar' => ['Filmes', 'list'],
    '/filmes/cadastrar' => ['Filmes', 'create'],

    '/series/listar' => ['Series', 'list'],
    '/series/editar' => ['Series', 'edit'],
    '/series/cadastrar' => ['Series', 'create'],

    '/projetos/listar' => ['Projetos', 'list'],
    '/projetos/editar' => ['Projetos', 'edit'],
    '/projetos/cadastrar' => ['Projetos', 'create'],

    '/softwares/listar' => ['Software', 'list'],
    '/softwares/cadastrar' => ['Software', 'create'],

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
