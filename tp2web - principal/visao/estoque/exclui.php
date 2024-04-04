<?php
include('../../verificaLogin.php');
require_once '../../dao/DAOEstoque.php';
require_once '../../dao/Conexao.php';
require_once '../../modelo/Estoque.php';

$obj = new Estoque();
$dao = new DAOEstoque();

$id = filter_input(INPUT_POST, 'idEstoque');
$checado = filter_input(INPUT_POST, 'checado');

$obj->setIdEstoque($id);

if ($checado) {
    try {
        $dao->exclui($obj);
        echo '<script>
                alert("Produto excluído do estoque com sucesso!");
                window.location.href = "./listar.php";
              </script>';
        exit; // Encerre o script após o redirecionamento
    } catch (Exception $e) {
        $mensagemErro = 'Não é possível excluir o produto!';
    }
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Excluir Estoque</title>
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
