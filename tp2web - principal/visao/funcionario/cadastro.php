<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionário</title>
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

    // Obtendo dados do formulário
    $nome = filter_input(INPUT_POST, 'nome') ?? '';
    $usuario = filter_input(INPUT_POST, 'usuario') ?? '';
    $senha = filter_input(INPUT_POST, 'senha') ?? '';

    // Verificando se todos os dados estão presentes
    if ($nome && $usuario && $senha) {
        $obj->setNome($nome);
        $obj->setUsuario($usuario);
        $obj->setSenha($senha);

        // Tentando incluir o funcionário
        if ($dao->inclui($obj)) {
            echo '<h1>Funcionário cadastrado com sucesso!</h1>';
            echo '<br><a href="../formPrincipal.php">Início</a>';
            echo '<br><a href="listar.php">Listar Funcionários</a><br>';
        } else {
            echo 'Erro ao cadastrar o funcionário!';
        }
    } else {
        echo 'Dados ausentes ou incorretos!';
    }
    ?>
</body>

</html>
