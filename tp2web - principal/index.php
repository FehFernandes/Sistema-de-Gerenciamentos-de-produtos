<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <link rel="icon" type="image/x-icon" href="./frontend/src/imgs/logo.png">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="./frontend/src/cs/login.cs">
</head>

<body class="body">

<div id="login-container">
    <form action="./login.php" id="login-card" method="POST">
      <div id="card-title">
        <h2>Login</h2>
      </div>
      <div id="card-body">
        <div class="input-group">
          <label for="usuario">Usuário</label>
          <input type="text" id="usuario" name="usuario" autocomplete="off">
        </div>
        <div class="input-group">
          <label for="senha">Senha</label>
          <input type="password" id="senha" name="senha" autocomplete="off">
        </div>
        <?php
        if(isset($_SESSION['invalido'])):
        ?>
        <div>
          <p id="error-message">Usuário ou senha inválidos.</p>
        </div>
        <?php
        endif;
        unset($_SESSION['invalido']);
        ?>
      </div>
      <div id="card-footer">
        <button id="login-button"> Entrar </button>
      </div>
    </form>
</div>

<link rel="stylesheet" href="./frontend/src/css/login.css">

</body>

</html>