<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/globals.css">
    <link rel="stylesheet" href="/public/css/forms.css">
    <title>Cadastrar Projeto</title>
</head>
<body>
    <?php require dirname(__DIR__).'/header.php' ?>
    <h2 class="title">Cadastrar Projeto</h2>
    <form class="form" action="/projetos/cadastrar" method="post" autocomplete="off">
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
            <select name="status">
                <option value="Em Criação">Em Criação</option>
                <option value="Em Produção">Em Produção</option>
                <option value="Em Revisão">Em Revisão</option>
                <option value="Em Correção">Em Correção</option>
                <option value="Concluído">Concluído</option>
            </select>
        </div>
        <input type="url" name="link" placeholder="Link">
        <textarea name="descricao" placeholder="Descrição" rows="6"></textarea>
        <textarea name="anotacoes" placeholder="Anotações" rows="14"></textarea>
        <div>
            <button type="button" onclick="history.back();">Voltar</button>
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</body>
</html>
