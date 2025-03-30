<?php
$id = $_GET['id'];
$row = $result->fetch_assoc();
$status = ['Em Criação', 'Em Produção', 'Em Revisão', 'Em Correção', 'Concluído'];
$groups = [
    'Mídia' => 'midia',
    'Minecraft' => 'minecraft',
    'Disciplina' => 'disciplina',
    'Pessoal' => 'pessoal',
    'Pesquisa' => 'pesquisa',
    'Outro' => 'outro'
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/globals.css">
    <link rel="stylesheet" href="/public/css/forms.css">
    <link rel="stylesheet" href="/public/css/groups.css">
    <title>Editar Projeto</title>
</head>
<body>
    <?php require dirname(__DIR__).'/header.php' ?>
    <h2 class="title">Editar Projeto</h2>
    <h3><?=$row['titulo']?></h3>
    <form class="form" action="/projetos/editar?id=<?=$id?>" method="post" autocomplete="off">
        <div>
            <span class="<?=$groups[$row['grupo']]?>"><?=$row['grupo']?></span>
            <select name="status">
                <?php foreach ($status as $s): ?>
                    <option value="<?=$s?>" <?= $row['status'] === $s ? 'selected' : '' ?>><?=$s?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="url" name="link" placeholder="Link" value="<?=$row['link']?>">
        <textarea name="descricao" placeholder="Descrição" rows="6">
            <?=$row['descricao']?>
        </textarea>
        <textarea name="anotacoes" placeholder="Anotações" rows="14">
            <?=$row['anotacoes']?>
        </textarea>
        <div>
            <button type="button" onclick="history.back();">Voltar</button>
            <button type="submit">Salvar</button>
        </div>
    </form>
    <script src="/public/js/trim.js"></script>
</body>
</html>
