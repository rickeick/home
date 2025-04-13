<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/globals.css">
    <link rel="stylesheet" href="/public/css/forms.css">
    <title>Cadastrar Anime</title>
</head>
<body>
    <?php require dirname(__DIR__).'/header.php' ?>
    <h2 class="title">Cadastrar Anime</h2>
    <form class="form" action="/animes/cadastrar" method="post" autocomplete="off">
        <div>
            <input style="width: 70%;" type="text" name="nome" placeholder="Nome">
            <select style="width: 20%;" name="status">
                <option value="atual">Atual</option>
                <option value="concluido">Concluido</option>
                <option value="pendente">Pendente</option>
                <option value="oculto">Oculto</option>
            </select>
        </div>
        <div>
            <input style="width: 20%;" type="text" name="lancamento" placeholder="Lançamento">
            <input style="width: 20%;" type="number" name="concluidos" min="0" step="1" placeholder="Concluídos" value="0">
            <input style="width: 20%;" type="number" name="atuais" min="0" step="1" placeholder="Eps Atuais">
            <input style="width: 20%;" type="number" name="total" min="0" step="1" placeholder="Total" value="0">
        </div>
        <input type="url" name="link" placeholder="Link">
        <div>
            <button type="button" onclick="history.back();">Voltar</button>
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</body>
</html>
