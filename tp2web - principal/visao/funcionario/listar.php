<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar de Funcionários</title>
    <link rel="stylesheet" href="../../frontend/src/css_forms/funcionario/formlistarfuncionario.css">
</head>

<?php
include('../../verificaLogin.php');
?>

<body class="body">
    <h1 class="titulo">Lista de Funcionários</h1>
    <table class="tabela">
        <tr>
            <th>ID Funcionário</th>
            <th>Nome</th>
            <th>Usuário</th>
            <th>Senha</th>
            <th>Excluir</th>
            <th>Editar</th>
        </tr>

        <?php
        require_once '../../dao/DAOFuncionario.php';
        require_once '../../dao/Conexao.php';

        $dao = new DAOFuncionario();
        $lista = $dao->lista();

        foreach ($lista as $v) {
            echo '<tr>';
            echo '<td>' . $v['idFuncionario'] . '</td>';
            echo '<td>' . $v['nome'] . '</td>';
            echo '<td>' . $v['usuario'] . '</td>';
            echo '<td>' . $v['senha'] . '</td>';
            echo '<td><a id="excluir" href="exclui.php?idFuncionario=' . $v['idFuncionario'] . '" alt="Excluir"><img src="../css/imagens/apagar.png" style="cursor: pointer;" /></a></td>';
            echo '<td><a id="editar" href="formEdicao.php?idFuncionario=' . $v['idFuncionario'] . '" alt="Editar"><img src="../css/imagens/editar.png" style="cursor: pointer;" /></a></td>';
            echo '</tr>';
        }
        ?>

    </table>

    <br>

    <form action="../formPrincipal.php">
        <button>Início</button>
    </form>
</body>

</html>
