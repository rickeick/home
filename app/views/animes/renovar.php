<?php
$id = $_GET['id'];
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/globals.css">
    <link rel="stylesheet" href="/public/css/forms.css">
    <title>Renovar Anime</title>
</head>
<body>
    <?php require dirname(__DIR__).'/header.php' ?>
    <h2 class="title">Renovar Anime</h2>
    <h3><?=$row['nome']?></h3>
    <form class="form" action="/animes/renovar?id=<?=$id?>" method="post" autocomplete="off">
        <div>
            <input type="number" name="atuais" min="1" step="1" placeholder="Eps Atuais">
            <input type="text" name="lancamento" placeholder="Lançamento">
        </div>
        <input type="url" name="link" placeholder="Link">
        <div>
            <button type="button" onclick="history.back();">Voltar</button>
            <button type="submit">Renovar</button>
        </div>
    </form>
</body>
</html>
