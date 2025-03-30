<?php
$id = $_GET['id'];
$row = $result->fetch_assoc();
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
    <link rel="stylesheet" href="/public/css/groups.css">
    <link rel="stylesheet" href="/public/css/forms.css">
    <title>Editar Tarefa</title>
</head>
<body>
    <?php require dirname(__DIR__).'/header.php' ?>
    <h2 class="title">Editar Tarefa</h2>
    <form class="form" action="/tarefas/editar?id=<?=$id?>" method="post" autocomplete="off">
        <div>
            <input type="text" name="titulo" placeholder="Titulo" value="<?=$row['titulo']?>">
            <span class="<?=$groups[$row['grupo']]?>"><?=$row['grupo']?></span>
            <input type="date" name="data" value="<?=$row['data']?>">
        </div>
        <textarea name="anotacoes" placeholder="Anotações" rows="14"><?=$row['anotacoes']?></textarea>
        <div>
            <button type="button" onclick="history.back();">Voltar</button>
            <a href="/tarefas/concluir?id=<?=$id?>">Concluir</a>
            <button type="submit">Salvar</button>
        </div>
    </form>
    <script src="/public/js/trim.js"></script>
</body>
</html>
