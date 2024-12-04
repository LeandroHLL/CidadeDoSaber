<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../public/css/stylesign.css">
  <title>Login</title>
</head>
<?php include '../common/header.php'; ?>

<body>
  <div class="main-login">
    <div class="left-login">
      <h1>Faça login<br>E entre para o nosso time</h1>
      <img src="../../../public/img/person-working.svg" class="left-login-image" alt="Pessoa trabalhando">
    </div>
    <div class="right-login">
      <div class="card-login">
        <h1>LOGIN</h1>
        <div class="textfield">
          <label for="usuario">Usuário</label>
          <input type="text" name="usuario" placeholder="Usuário">
        </div>
        <div class="textfield">
          <label for="password">Senha</label>
          <input type="password" name="password" placeholder="Senha">
        </div>
        <button class="btn-login">Login</button>
        <div class="login-options">
          <a href="forgot-password.php" class="forgot-password-link">Esqueceu a senha?</a>
          <a href="cadastro.php" class="register-link">Cadastre-se</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>