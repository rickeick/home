<?php
$status = [
    'Em Criação' => 'criacao',
    'Em Produção' => 'producao',
    'Em Revisão' => 'revisao',
    'Em Correção' => 'correcao',
    'Concluído' => 'concluido'
];
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
    <link rel="stylesheet" href="/public/css/tables.css">
    <link rel="stylesheet" href="/public/css/groups.css">
    <link rel="stylesheet" href="/public/css/status.css">
    <title>Projetos</title>
</head>
<body>
    <?php require dirname(__DIR__).'/header.php' ?>
    <h2 class="title">Projetos</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Status</th>
                <th>Grupo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td>
                        <?php if ($row['link'] !== ''): ?>
                            <a href="<?=$row['link']?>"> <?=$row['titulo']?> </a>
                        <?php else: ?>
                            <?=$row['titulo']?>
                        <?php endif ?>
                    </td>
                    <td><span class="<?=$status[$row['status']]?>"><?=$row['status']?></span></td>
                    <td><span class="<?=$groups[$row['grupo']]?>"><?=$row['grupo']?></span></td>
                    <td><a href="/projetos/editar?id=<?=$row['id']?>">Editar</a></td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
    <a href="/projetos/cadastrar" class="button-new">+</a>
</body>
</html>
