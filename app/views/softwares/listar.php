<?php
$tamanho = 0;
$software = 0;
$plataforma = [
    'Windows' => 0,
    'Linux' => 0,
    'Multi' => 0
];
$categoria = [
    'Dev' => 0,
    'Games' => 0,
    'Social' => 0,
    'Utilitário' => 0,
];
function format($string) : string {
    return strtr(strtolower($string), ['á' => 'a']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/globals.css">
    <link rel="stylesheet" href="/public/css/tables.css">
    <link rel="stylesheet" href="/public/css/category.css">
    <link rel="stylesheet" href="/public/css/platform.css">
    <title>Softwares</title>
</head>
<body>
    <?php require dirname(__DIR__).'/header.php' ?>
    <h2 class="title">Softwares</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Tamanho</th>
                <th>Categoria</th>
                <th>Plataforma</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <?php
                    $software += 1;
                    $tamanho += $row['tamanho'];
                    $categoria[$row['categoria']] += 1;
                    $plataforma[$row['plataforma']] += 1;
                ?>
                <tr>
                    <td>
                        <?php if ($row['link'] !== ''): ?>
                            <a href="<?=$row['link']?>"> <?=$row['nome']?> </a>
                        <?php else: ?>
                            <?=$row['nome']?>
                        <?php endif ?>
                    </td>
                    <td><?=$row['tamanho']?></td>
                    <td><span class="<?=format($row['categoria'])?>"><?=$row['categoria']?></span></td>
                    <td><span class="<?=format($row['plataforma'])?>"><?=$row['plataforma']?></span></td>
                </tr>
            <?php endwhile ?>
            <tr>
                <td><?=$software?></td>
                <td><?=$tamanho?></td>
                <td><?=implode('/', $categoria)?></td>
                <td><?=implode('/', $plataforma)?></td>
            </tr>
        </tbody>
    </table>
    <a href="/softwares/cadastrar" class="button-new">+</a>
</body>
</html>
