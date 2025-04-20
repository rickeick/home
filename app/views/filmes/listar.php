<?php
    $filmes = 0;
    $duracao = 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/globals.css">
    <link rel="stylesheet" href="/public/css/tables.css">
    <title>Filmes</title>
</head>
<body>
    <?php require dirname(__DIR__).'/header.php' ?>
    <h2 class="title">Filmes</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Duração</th>
                <th>Ano</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <?php 
                    $filmes += 1;
                    $duracao += $row['duracao'];
                ?>
                <tr>
                    <td><?=$row['titulo']?></td>
                    <td><?=$row['duracao']?></td>
                    <td><?=$row['ano']?></td>
                </tr>
            <?php endwhile ?>
            <tr>
                <td><?=$filmes?></td>
                <td><?=number_format($duracao/60, 2, ',')?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <a href="/filmes/cadastrar" class="button-new">+</a>
</body>
</html>
