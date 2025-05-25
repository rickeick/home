<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/globals.css">
    <link rel="stylesheet" href="/public/css/home.css">
    <title>Home</title>
</head>
<body>
    <?php require 'header.php' ?>
    <div class="modal">
        <div>
            <h2 class="title">Editar Wallpaper</h2>
            <input type="url" id="wallpaper" placeholder="Link do Wallpaper" autocomplete="off">
            <input type="text" id="position" placeholder="Posição em relação à Y" autocomplete="off">
            <button id="cancel" type="button">Cancelar</button>
            <button id="ok" type="button">Ok</button>
        </div>
    </div>
    <script src="/public/js/background.js"></script>
    <script src="/public/js/backup.js"></script>
</body>
</html>
