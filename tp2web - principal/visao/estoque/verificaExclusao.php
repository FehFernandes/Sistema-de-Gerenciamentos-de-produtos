<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Verificar exclusão</title>
</head>

<body class="body">
    <?php
    $id = filter_input(INPUT_POST, 'idEstoque');

    echo "Deseja realmente excluir o produto?";
    ?>

    <div class="verificaExclusao">
        <form method="POST" action="./listar.php">
            <button type="submit">Não</button>
        </form>

        <form method="POST" action="exclui.php">
            <input type="hidden" name="idEstoque" value="<?= $id ?>">
            <input type="hidden" name="checado" value="1">
            <button type="submit">Sim</button>
        </form>
    </div>
</body>

</html>
