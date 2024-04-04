<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="../../frontend/src/css_forms/estoque/formlistarestoque.css">
</head>

<body class="body">
    <?php
    include('../../verificaLogin.php');
    
    require_once '../../dao/DAOEstoque.php';
    require_once '../../dao/Conexao.php';

    $dao = new DAOEstoque();
    $lista = $dao->lista();
    ?>

    <div class="tabela">
        <h1>Estoque</h1>
        <table>
            <tr>
                <th>ID Estoque</th>
                <th>Fornecedor</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Excluir</th>
                <th>Editar</th>
            </tr>

            <?php foreach ($lista as $v): ?>
                <tr>
                    <td><?= $v['idEstoque'] ?></td>
                    <td><?= $v['fornecedor'] ?></td>
                    <td><?= $v['nome'] ?></td>
                    <td><?= $v['preco'] ?></td>
                    <td><?= $v['quantidade'] ?></td>
                    <td>
                        <form action="./verificaExclusao.php" method="POST">
                            <input name="idEstoque" type="hidden" value="<?= $v['idEstoque'] ?>"/>
                            <button class="botoesTd"><img src="../css/imagens/apagar.png"/></button>
                        </form>
                    </td>
                    <td>
                        <form action="./formEdicao.php" method="POST">
                            <input name="idEstoque" type="hidden" value="<?= $v['idEstoque'] ?>"/>
                            <button class="botoesTd"><img src="../css/imagens/editar.png"/></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>

    <div class="botoes">
        <form action="../formPrincipal.php">
            <button>Início</button>
        </form>

        <form action="./formCadastro.php">
            <button>Cadastrar</button>
        </form>
    </div>
    <link rel="stylesheet" href="../../frontend/src/css_forms/estoque/formlistarestoque.css">
</body>

</html>
