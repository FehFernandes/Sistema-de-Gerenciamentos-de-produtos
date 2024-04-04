<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Edição de Fornecedor</title>
</head>

<body class="body">
    <?php
    include('../../verificaLogin.php');
    
    require_once '../../dao/DAOFornecedor.php';
    require_once '../../dao/Conexao.php';
    require_once '../../modelo/Fornecedor.php';

    $obj = new Fornecedor();
    $dao = new DAOFornecedor();

    $id = filter_input(INPUT_POST, 'idFornecedor');
    $nome = filter_input(INPUT_POST, 'nome');
    $endereco = filter_input(INPUT_POST, 'endereco');

    if ($id && $nome && $endereco) {
        $obj->setIdFornecedor($id);
        $obj->setNome($nome);
        $obj->setEndereco($endereco);

        if ($dao->altera($obj)) {
            echo '<script>
                    alert("Fornecedor editado com sucesso");
                    window.location.href = "./listar.php";
                  </script>';
        } else {
            echo 'Erro ao editar o fornecedor.';
        }
    } else {
        echo '<script>
                alert("Dados ausentes ou incorretos");
                window.location.href = "./listar.php";
               </script>';
    }
    ?>
</body>

</html>
