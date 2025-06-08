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
    <title>Editar Série</title>
</head>
<body>
    <?php require dirname(__DIR__).'/header.php' ?>
    <h2 class="title">Editar Série</h2>
    <form class="form" action="/series/editar?id=<?=$id?>" method="post" autocomplete="off">
        <div>
            <input style="width: 45%;" type="text" name="titulo" placeholder="Título" value="<?=$row['titulo']?>">
            <input style="width: 45%;" type="number" name="duracao" min="0" step="1" placeholder="Duração" value="<?=$row['duracao']?>">
        </div>
        <div>
            <input style="width: 45%;" type="number" name="temporadas" min="0" step="1" placeholder="Temporadas" value="<?=$row['temporadas']?>">
            <input style="width: 45%;" type="number" name="episodios" min="0" step="1" placeholder="Episódios" value="<?=$row['episodios']?>">
        </div>
        <div>
            <button type="button" onclick="history.back();">Voltar</button>
            <button type="submit">Salvar</button>
        </div>
    </form>
</body>
</html>
