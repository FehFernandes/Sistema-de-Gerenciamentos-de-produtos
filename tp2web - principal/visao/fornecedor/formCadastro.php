<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../frontend/src/css_forms/fornecedor/formedicaofornecedor.css">
    <title>Edição do Fornecedor</title>
    <style>
        <?php include('../../frontend/src/css_forms/fornecedor/formedicaofornecedor.css'); ?>
    </style>
</head>

<?php
include('../../verificaLogin.php');
?>

<body>
    <?php
    include '../menu.php';
    
    require_once '../../dao/DAOFornecedor.php';
    require_once '../../dao/Conexao.php';
    require_once '../../modelo/Fornecedor.php';

    $id = filter_input(INPUT_POST, 'idFornecedor');

    $dao = new DAOFornecedor();
    $lista = $dao->localiza($id);

    $fornecedor = $lista[0];
    ?>

    <div class="container">
        <div class="card">
            <h1 class="card-header text-center"> Edição de Fornecedor </h1>
            <form action="edicao.php" method="post">
                <input type="hidden" name="idFornecedor" id="idFornecedor" value="<?= $fornecedor['idFornecedor'] ?>">

                <div class="input-group">
                    <label for="nome">Fornecedor</label>
                    <input class="form-control" type="text" name="nome" id="nome" value="<?= $fornecedor['nome'] ?>">
                </div>

                <div class="input-group">
                    <label for="endereco">Endereço</label>
                    <input class="form-control" type="text" name="endereco" value="<?= $fornecedor['endereco'] ?>">
                </div>

                <div>
                    <button class="btn btn-outline-success">Salvar</button>
                    <button class="btn btn-outline-dark" onclick="location.href='../formPrincipal.php'">Início</button>
                    <button class="btn btn-outline-dark" onclick="location.href='./listar.php'">Listar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
