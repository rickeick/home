<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/globals.css">
    <link rel="stylesheet" href="/public/css/forms.css">
    <title>Cadastrar Software</title>
</head>
<body>
    <?php require dirname(__DIR__).'/header.php' ?>
    <h2 class="title">Cadastrar Software</h2>
    <form class="form" action="/softwares/cadastrar" method="post" autocomplete="off">
        <input style="width: 33%;" type="text" name="nome" placeholder="Nome">
        <input style="width: 33%;" type="text" name="link" placeholder="Link">
        <div>
            <select name="plataforma">
                <option value="Windows">Windows</option>
                <option value="Linux">Linux</option>
                <option value="Multi">Multi</option>
            </select>
            <select name="categoria">
                <option value="Dev">Dev</option>
                <option value="Games">Games</option>
                <option value="Social">Social</option>
                <option value="Utilitário">Utilitário</option>
            </select>
            <input type="number" name="tamanho" step="1" placeholder="Tamanho (MB)">
        </div>
        <div>
            <button type="button" onclick="history.back();">Voltar</button>
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</body>
</html>
