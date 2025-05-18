<?php
$jogos = 0;
$tamanho = 0;
$launcher = [
    'Epic' => 'epic',
    'Steam' => 'steam',
    'Ubisoft' => 'ubisoft',
    'EA' => 'ea'
];
$execucao = [
    'Boa' => 'boa',
    'Ruim' => 'ruim',
    'Péssima' => 'pessima'
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/globals.css">
    <link rel="stylesheet" href="/public/css/tables.css">
    <link rel="stylesheet" href="/public/css/execucao.css">
    <link rel="stylesheet" href="/public/css/launchers.css">
    <title>Jogos</title>
</head>
<body>
    <?php require dirname(__DIR__).'/header.php' ?>
    <h2 class="title">Jogos</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Tamanho</th>
                <th>Launcher</th>
                <th>Execução</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <?php
                $jogos += 1;
                $tamanho += $row['tamanho'];
                ?>
                <tr>
                    <td><?=$row['nome']?></td>
                    <td><?=$row['tamanho']?></td>
                    <td><span class="<?=$launcher[$row['launcher']]?>"><?=$row['launcher']?></span></td>
                    <td><span class="<?=$execucao[$row['execução']]?>"><?=$row['execução']?></span></td>
                </tr>
            <?php endwhile ?>
            <tr>
                <td><?=$jogos?></td>
                <td><?=$tamanho?></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <a href="/jogos/cadastrar" class="button-new">+</a>
</body>
</html>
