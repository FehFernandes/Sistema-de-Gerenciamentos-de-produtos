<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../frontend/src/css_forms/fornecedor/formlistarfornecedor.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Lista de Fornecedores</title>
</head>

<?php
include('../../verificaLogin.php');
?>

<body class="body">
    <div class="container" style="width: 60rem;">
        <div class="card">
            <h1 class="card-header"> Fornecedores </h1>
            <table class="table">
                <tr>
                    <th> ID </th>
                    <th> Nome </th>
                    <th> Endereço </th>
                    <th> Excluir </th>
                    <th> Editar </th>
                </tr>

                <?php
                require_once '../../dao/DAOFornecedor.php';
                require_once '../../dao/Conexao.php';

                $dao = new DAOFornecedor();
                $lista = $dao->lista();

                foreach ($lista as $v) {
                    echo '<tr>';

                    echo '<td>' . $v['idFornecedor'] . '</td>';
                    echo '<td>' . $v['nome'] . '</td>';
                    echo '<td>' . $v['endereco'] . '</td>';
                    echo '<td> <form action="./verificaExclusao.php" method="POST"> <input name="idFornecedor" type="hidden" value="' . $v['idFornecedor'] . '"/> <button class="btn"> <img class="img-fluid" src="../css/imagens/apagar.png"/> </button> </form></td>';
                    echo '<td> <form action="./formEdicao.php" method="POST"> <input name="idFornecedor" type="hidden" value="' . $v['idFornecedor'] . '"/> <button class="btn"> <img class="img-fluid" src="../css/imagens/editar.png"/> </button> </form></td>';

                    echo '</tr>';
                }
                ?>

            </table>

            <div class="btn-group">
                <form action="../formPrincipal.php">
                    <button class="btn"> Início </button>
                </form>

                <form action="./formCadastro.php">
                    <button class="btn"> Cadastrar </button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../script.js"></script>
</body>

</html>
