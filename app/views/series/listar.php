<?php
    $series = 0;
    $duracao = 0;
    $temporadas = 0;
    $episodios = 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/globals.css">
    <link rel="stylesheet" href="/public/css/tables.css">
    <title>Séries</title>
</head>
<body>
    <?php require dirname(__DIR__).'/header.php' ?>
    <h2 class="title">Séries</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Duração</th>
                <th>Temporadas</th>
                <th>Episódios</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <?php
                    $series += 1;
                    $duracao += $row['duracao'];
                    $temporadas += $row['temporadas'];
                    $episodios += $row['episodios'];
                ?>
                <tr>
                    <td><?=$row['titulo']?></td>
                    <td><?=$row['duracao']?></td>
                    <td><?=$row['temporadas']?></td>
                    <td><?=$row['episodios']?></td>
                    <td><a href="/series/editar?id=<?=$row['id']?>">Editar</a></td>
                </tr>
            <?php endwhile ?>
            <tr>
                <td><?=$series?></td>
                <td><?=number_format($duracao/$series, 2, ',')?></td>
                <td><?=$temporadas?></td>
                <td><?=$episodios?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <a href="/series/cadastrar" class="button-new">+</a>
</body>
</html>
