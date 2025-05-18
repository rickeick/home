<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/globals.css">
    <link rel="stylesheet" href="/public/css/forms.css">
    <title>Cadastrar Jogo</title>
</head>
<body>
    <?php require dirname(__DIR__).'/header.php' ?>
    <h2 class="title">Cadastrar Jogo</h2>
    <form class="form" action="/jogos/cadastrar" method="post" autocomplete="off">
        <input style="width: 33%;" type="text" name="nome" placeholder="Nome">
        <div>
            <select name="launcher">
                <option value="Epic">Epic</option>
                <option value="Steam">Steam</option>
                <option value="Ubisoft">Ubisoft</option>
                <option value="EA">EA</option>
            </select>
            <select name="execucao">
                <option value="Boa">Boa</option>
                <option value="Ruim">Ruim</option>
                <option value="Péssima">Péssima</option>
            </select>
            <input type="number" name="tamanho" step="0.01" placeholder="Tamanho (GB)">
        </div>
        <div>
            <button type="button" onclick="history.back();">Voltar</button>
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</body>
</html>
