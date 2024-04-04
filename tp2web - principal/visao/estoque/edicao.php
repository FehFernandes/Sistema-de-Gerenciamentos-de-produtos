<?php
include('../../verificaLogin.php');
require_once '../../dao/DAOEstoque.php';
require_once '../../dao/Conexao.php';
require_once '../../modelo/Estoque.php';

$obj = new Estoque();
$dao = new DAOEstoque();

$id = filter_input(INPUT_POST, 'idEstoque');
$idFornecedor = filter_input(INPUT_POST, 'idFornecedor');
$nome = filter_input(INPUT_POST, 'nome');
$preco = filter_input(INPUT_POST, 'preco');
$quantidade = filter_input(INPUT_POST, 'quantidade');

if ($id && $idFornecedor && $nome && $preco && $quantidade) {
    $obj->setIdEstoque($id);
    $obj->setIdFornecedor($idFornecedor);
    $obj->setNome($nome);
    $obj->setPreco($preco);
    $obj->setQuantidade($quantidade);

    if ($dao->altera($obj)) {
        echo '<script>
            alert("Produto editado com sucesso");
            window.location.href = "./listar.php";
          </script>';
        exit; // Encerre o script após o redirecionamento
    } else {
        $mensagemErro = 'Erro na edição do produto!';
    }
} else {
    $mensagemErro = 'Erro!';
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Edição</title>
</head>

<body class="body">
    <?php
    if (isset($mensagemErro)) {
        echo '<script>
                alert("' . $mensagemErro . '");
                window.location.href = "./listar.php";
              </script>';
    }
    ?>
</body>

</html>
