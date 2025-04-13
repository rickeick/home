<?php
$zone = new DateTimeZone('America/Sao_Paulo');
$hoje = new DateTime('now', $zone);
$mes = $_GET['mes'] ?? $hoje->format('m');
$ano = $_GET['ano'] ?? $hoje->format('Y');
$data = new DateTime("$ano-$mes-01");
$next = (clone $data)->modify('+1 month');
$prev = (clone $data)->modify('-1 month');
if (isset($result)) {
    if (mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
    }
}
$groups = [
    'Mídia' => 'midia',
    'Minecraft' => 'minecraft',
    'Disciplina' => 'disciplina',
    'Pessoal' => 'pessoal',
    'Pesquisa' => 'pesquisa',
    'Outro' => 'outro'
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/globals.css">
    <link rel="stylesheet" href="/public/css/calendar.css">
    <link rel="stylesheet" href="/public/css/groups.css">
    <title>Calendario</title>
</head>
<body>
    <?php require dirname(__DIR__).'/header.php' ?>
    <div class="title">
        <h2>Tarefas <?="$mes/$ano"?></h2>
        <div>
            <a href="/tarefas/calendario?mes=<?=$prev->format('m')?>&ano=<?=$prev->format('Y')?>">Anterior</a>
            <a href="/tarefas/calendario">Hoje</a>
            <a href="/tarefas/calendario?mes=<?=$next->format('m')?>&ano=<?=$next->format('Y')?>">Próximo</a>
        </div>
    </div>
    <table class="calendario">
        <thead>
            <tr>
                <th>DOM</th>
                <th>SEG</th>
                <th>TER</th>
                <th>QUA</th>
                <th>QUI</th>
                <th>SEX</th>
                <th>SAB</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($data->format('m') == $mes): ?>
                <tr>
                    <?php for ($j=0; $j<7; $j++): ?>
                        <?php if ($data->format('m') == $mes && $data->format('N')%7 == $j): ?>
                            <td>
                                <?php if ($data->format('Y-m-d') == $hoje->format('Y-m-d')): ?>
                                    <span class="hoje"><?=$hoje->format('d')?></span>
                                <?php else: ?>
                                    <span><?=$data->format('d')?></span>
                                <?php endif ?>
                                <?php while (true): ?>
                                    <?php
                                        if (isset($row)) {
                                            $tarefa = new DateTime($row['data']);
                                            if ($tarefa->format('Y-m-d') != $data->format('Y-m-d')) {
                                                break;
                                            }
                                        } else {
                                            break;
                                        }
                                    ?>
                                    <p class="<?=$groups[$row['grupo']]?>">
                                        <a href="/tarefas/editar?id=<?=$row['id']?>"><?=$row['titulo']?></a>
                                    </p>
                                    <?php $row = $result->fetch_assoc(); ?>
                                <?php endwhile ?>
                            </td>
                            <?php $data->modify('+1 day'); ?>
                        <?php else: ?>
                            <td></td>
                        <?php endif ?>
                    <?php endfor ?>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
    <a href="/tarefas/cadastrar" class="button-new">+</a>
    <script>
    document.addEventListener('keydown', function(event) {
        if (event.key === "ArrowLeft") {
            let link = "/tarefas/calendario?mes=<?=$prev->format('m')?>&ano=<?=$prev->format('Y')?>"
            window.location.assign(link);
        } else if (event.key === "ArrowRight") {
            let link = "/tarefas/calendario?mes=<?=$next->format('m')?>&ano=<?=$next->format('Y')?>"
            window.location.assign(link);
        }
    });
    </script>
</body>
</html>
