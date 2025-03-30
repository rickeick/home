<?php
$title = $title ?? 'Página não Encontrada';
$content = $content ?? 'Verifique a URL inserida!';
$redirect = $redirect ?? 'back';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/globals.css">
    <link rel="stylesheet" href="/public/css/message.css">
    <title>Mensagem</title>
</head>
<body>
    <?php require 'header.php' ?>
    <div class="message">
        <h2 class="title"><?=$title?></h2>
        <p><?=$content?></p>
        <?php if ($redirect === 'back'): ?>
            <button type="button" onclick="history.back();">Voltar</button>
        <?php else: ?>
            <a href="<?=$redirect?>">Ok</a>
        <?php endif ?>
    </div>
</body>
</html>
