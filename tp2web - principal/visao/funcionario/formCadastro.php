<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../frontend/src/css_forms/funcionario/formcadastrofuncionario.css">
    <title>Cadastro de Funcionário</title>
</head>
<body class="body">
    <header>
        <h1>Cadastro de Funcionário</h1>
        <p>Preencha o formulário abaixo para cadastrar um novo funcionário.</p>
    </header>
    <main>
        <form action="cadastro.php" method="post">
            <div>
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" required>
            </div>

            <div>
                <label for="usuario">Usuário</label>
                <input type="text" name="usuario" id="usuario" required>
            </div>

            <div>
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" required>
            </div>

            <div>
                <button type="submit">Salvar</button>
            </div>
        </form>

        <form action="../formPrincipal.php">
            <button type="submit">Início</button>
        </form>
    </main>
</body>
</html>
