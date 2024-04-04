<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de Funcionário</title>
</head>

<?php
include('../../verificaLogin.php');
?>

<body class="body">
    <?php
    // Incluindo arquivos necessários
    require_once '../../dao/DAOFuncionario.php';
    require_once '../../dao/Conexao.php';
    require_once '../../modelo/Funcionario.php';

    // Criando instâncias
    $obj = new Funcionario();
    $dao = new DAOFuncionario();

    // Obtendo o ID do funcionário a ser excluído
    $id = filter_input(INPUT_GET, 'idFuncionario');

    // Configurando o ID no objeto Funcionario
    $obj->setIdFuncionario($id);

    // Tentando excluir o funcionário
    if ($dao->exclui($obj)) {
        echo '<h1>Funcionário excluído com sucesso!</h1>';
        echo '<br><a href="../../index.php">Início</a>';
        echo '<br><a href="listar.php">Listar Funcionários</a><br>';
    } else {
        echo 'Erro ao excluir o funcionário!';
    }
    ?>
</body>

</html>
