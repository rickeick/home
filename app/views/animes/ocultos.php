<?php
    $animes = 0;
    $episodios = 0;
    $temporadas = 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/globals.css">
    <link rel="stylesheet" href="/public/css/tables.css">
    <title>Animes Ocultos</title>
</head>
<body>
    <?php require dirname(__DIR__).'/header.php' ?>
    <div class="title">
        <h2>Animes Ocultos</h2>
        <div>
            <a href="/animes/atuais">Atuais</a>
            <a href="/animes/concluidos">Concluídos</a>
            <a href="/animes/pendentes">Pendentes</a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Temporadas</th>
                <th>Episódios</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <?php 
                    $animes += 1;
                    $episodios += $row['total'];
                    $temporadas += $row['concluidos'];
                ?>
                <tr>
                    <td><?=$row['nome']?></td>
                    <td><?=$row['concluidos']?></td>
                    <td><?=$row['total']?></td>
                </tr>
            <?php endwhile ?>
            <tr>
                <td><?=$animes?></td>
                <td><?=$temporadas?></td>
                <td><?=$episodios?></td>
            </tr>
        </tbody>
    </table>
    <a href="/animes/cadastrar" class="button-new">+</a>
</body>
</html>
