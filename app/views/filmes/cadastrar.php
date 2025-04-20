<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/globals.css">
    <link rel="stylesheet" href="/public/css/forms.css">
    <title>Cadastrar Filme</title>
</head>
<body>
    <?php require dirname(__DIR__).'/header.php' ?>
    <h2 class="title">Cadastrar Filme</h2>
    <form class="form" action="/filmes/cadastrar" method="post" autocomplete="off">
        <input type="text" name="titulo" placeholder="Titulo">
        <div>
            <input style="width: 45%;" type="number" name="duracao" min="0" step="1" placeholder="Duracao">
            <input style="width: 45%;" type="number" name="ano" min="0" step="1" placeholder="Ano">
        </div>
        <div>
            <button type="button" onclick="history.back();">Voltar</button>
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</body>
</html>
