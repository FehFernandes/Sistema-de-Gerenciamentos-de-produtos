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
    $id = filter_input(INPUT_POST, 'idFornecedor');
    ?>

    <div class="verificaExclusao">
        <?php
        echo "Deseja realmente excluir o fornecedor?";
        ?>
        <form method='POST' action='./listar.php'>
            <button> Não </button>
        </form>

        <form method='POST' action='exclui.php'>
            <input type='hidden' name='idFornecedor' value='<?php echo $id; ?>'>
            <input type='hidden' name='checado' value='1'>
            <button> Sim </button>
        </form>
    </div>
</body>

</html>
