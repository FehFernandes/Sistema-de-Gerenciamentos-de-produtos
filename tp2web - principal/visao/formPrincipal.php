<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../frontend/src/css/stylesMenu.css">
    <link rel="stylesheet" href="../frontend/src/css/mainform.css">
    <script src="../frontend/src/js/main.js"></script>
    <title>Página Principal</title>

</head>

<body class="body">

    <?php
    session_start();
    if (!$_SESSION['usuario']) {
        header('Location: ../index.php');
        exit();
    }
    ?>

    <nav class="menuLateral">
        <div class="logo"><a href=""><img src="../src/imgs/etech.png" alt="" srcset="" width="100px" height="100px"></a></div>
        <ul>
            <li><a href="#" class="fornecedor">Funcionario<span class="material-symbols-outlined setaFornecedor"> arrow_right </span></a>
                <ul class="itensFornecedor">
                    <li><a href="./funcionario/formCadastro.php">Cadastrar funcionarios</a></li>
                    <li><a href="./funcionario/listar.php">Lista de funcionarios</a></li>
                </ul>
            </li>
            <li><a href="#" class="fornecedor">Fornecedores<span class="material-symbols-outlined setaFornecedor"> arrow_right </span></a>
                <ul class="itensFornecedor">
                    <li><a href="./fornecedor/formCadastro.php">Cadastrar fornecedor</a></li>
                    <li><a href="./fornecedor/listar.php">Lista de fornecedores</a></li>
                </ul>
            </li>
            <li><a href="#" class="produto">Produtos<span class="material-symbols-outlined setaProduto"> arrow_right </span></a>
                <ul class="itensProduto">
                    <li><a href="./produto/formCadastro.php">Cadastrar produto</a></li>
                    <li><a href="./produto/listar.php">Lista de produtos</a></li>
                </ul>
            </li>
            <li><a href="#" class="estoque">Estoque<span class="material-symbols-outlined setaEstoque"> arrow_right </span></a>
                <ul class="itensEstoque">
                    <li><a href="./estoque/formCadastro.php">Cadastrar estoque</a></li>
                    <li><a href="./estoque/listar.php">Lista de estoque</a></li>
                </ul>
            </li>
            <li><a href="#" class="notinha">Notas<span class="material-symbols-outlined setaNotinha"> arrow_right </span></a>
                <ul class="itensNotinha">
                    <li><a href="./notaPromissoria/formCadastro.php">Cadastrar notas</a></li>
                    <li><a href="./notaPromissoria/listar.php">Lista de notas Ativas</a></li>
                    <li><a href="./notaPromissoria/listarInativas.php">Lista de notas Inativas</a></li>
                </ul>
            </li>
            <li><a href="#" class="vendas">Vendas<span class="material-symbols-outlined setaVendas"> arrow_right </span></a>
                <ul class="itensVendas">
                    <li><a href="./vendas/formCadastro.php">Cadastrar vendas diariamente</a></li>
                    <li><a href="./vendas/listar.php">Lista de vendas</a></li>
                </ul>
            </li>
        </ul>
    </nav>


    <div class="logout">
        <p class="card-text">
            <?php
            echo 'Usuário: ';
            echo '<span id="user-name">' . $_SESSION['nome'] . '</span>';
            echo '<span class="admin-badge">Admin</span>';
            ?>
        </p>

        <a href="../logout.php"><img src="../src/imgs/logoutimgg.png" class="logoutimg"></a>
    </div>

    <link rel="stylesheet" href="../frontend/src/css/stylesMenu.css">
    <link rel="stylesheet" href="../frontend/src/css/mainform.css">
    <script src="../frontend/src/js/main.js"></script>

</body>

</html>