<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../frontend/src/css_forms/fornecedor/formedicaofornecedor.css">
    <title>Edição do Fornecedor</title>
</head>

<?php
include('../../verificaLogin.php');
?>

<body class="body">
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

    <div class="container-fluid text-center" style="width: 36rem;">
        <div class="card">
            <h1 class="card-header text-center"> Edição de Fornecedor </h1>
            <form action="edicao.php" method="post" class="row justify-content-md-center" style="padding-top: 10px;">
                <input type="hidden" name="idFornecedor" id="idFornecedor" value="<?= $fornecedor['idFornecedor'] ?>">

                <label class="col-sm-4 col-form-label" for="nome">Fornecedor</label>
                <div class="col-sm-5">
                    <input class="form-control mb-3" type="text" name="nome" id="nome" value="<?= $fornecedor['nome'] ?>">
                </div>

                <label class="col-sm-4 col-form-label" for="endereco">Endereço</label>
                <div class="col-sm-5">
                    <input class="form-control mb-3" type="text" name="endereco" value="<?= $fornecedor['endereco'] ?>">
                </div>

                <div>
                    <button class="btn" style="margin-top: 20px;"> Salvar </button>
                </div>
            </form>

            <div class="row justify-content-md-center">
                <form action="../formPrincipal.php" class="col-5 text-center">
                    <button class="btn"> Início </button>
                </form>

                <form action="./listar.php" class="col-5 text-center">
                    <button class="btn"> Listar </button>
                </form>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="../../frontend/src/css_forms/fornecedor/formedicaofornecedor.css">
</body>

</html>
