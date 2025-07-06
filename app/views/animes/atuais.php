<?php
    $animes = 0;
    $episodios = 0;
    $dias = [0,0,0,0,0,0,0];
    $continuacoes = 0;
    $novos = 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/globals.css">
    <link rel="stylesheet" href="/public/css/tables.css">
    <title>Animes Atuais</title>
</head>
<body>
    <?php require dirname(__DIR__).'/header.php' ?>
    <div class="title">
        <h2>Animes Atuais</h2>
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
                <th>Temporada</th>
                <th>Episódios</th>
                <th>Lançamento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <?php 
                    $animes += 1;
                    $episodios += $row['total'];
                    $dias[$row['lancamento'][0]-1] += 1;
                    if ($row['concluidos'] == 0) $novos += 1;
                    else $continuacoes += 1;
                ?>
                <tr>
                    <td>
                        <?php if ($row['link'] !== ''): ?>
                            <a href="<?=$row['link']?>"> <?=$row['nome']?> </a>
                        <?php else: ?>
                            <?=$row['nome']?>
                        <?php endif ?>
                    </td>
                    <td><?=$row['concluidos']+1?></td>
                    <td><?=$row['atuais']?></td>
                    <td><?=$row['lancamento']?></td>
                    <td><a href="/animes/concluir?id=<?=$row['id']?>">Concluir</a> | <a href="/animes/suspender?id=<?=$row['id']?>">Suspender</a></td>
                </tr>
            <?php endwhile ?>
            <tr>
                <td><?=$animes?></td>
                <td><?="$novos/$continuacoes"?></td>
                <td><?=$episodios?></td>
                <td><?=implode('/', $dias);?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <a href="/animes/cadastrar" class="button-new">+</a>
</body>
</html>
