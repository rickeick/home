<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/globals.css">
    <link rel="stylesheet" href="/public/css/forms.css">
    <title>Cadastrar Tarefa</title>
</head>
<body>
    <?php require dirname(__DIR__).'/header.php' ?>
    <h2 class="title">Cadastrar Tarefa</h2>
    <form class="form" action="/tarefas/cadastrar" method="post" autocomplete="off">
        <div>
            <input type="text" name="titulo" placeholder="Titulo">
            <select name="grupo">
                <option value="Mídia">Mídia</option>
                <option value="Minecraft">Minecraft</option>
                <option value="Disciplina">Disciplina</option>
                <option value="Pesquisa">Pesquisa</option>
                <option value="Pessoal">Pessoal</option>
                <option value="Outro">Outro</option>
            </select>
            <input type="date" name="data">
        </div>
        <textarea name="anotacoes" placeholder="Anotações" rows="14"></textarea>
        <div>
            <button type="button" onclick="history.back();">Voltar</button>
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</body>
</html>
