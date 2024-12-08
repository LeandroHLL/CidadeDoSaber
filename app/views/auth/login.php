<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../public/css/stylesign.css">
  <title>EducaNet | Login</title>
  <style>
    .error-message {
      color: white;
      background-color: #e74c3c;
      /* Vermelho */
      padding: 10px;
      border-radius: 5px;
      text-align: center;
      margin-bottom: 15px;
      font-size: 14px;
    }
      .success-message {
      color: white;
      background-color: #01c929 ;
      /* verde */
      padding: 10px;
      border-radius: 5px;
      text-align: center;
      margin-bottom: 15px;
      font-size: 14px;
    }
  </style>
</head>
<?php
session_start();
include '../common/header.php';
?>

<body>
  <div class="main-login">
    <div class="right-login">
      <div class="card-login">
        <h1>LOGIN</h1>

        <!-- Exibição de mensagem de erro -->
        <?php if (isset($_SESSION['error'])): ?>
          <div class="error-message">
            <?php echo $_SESSION['error']; ?>
          </div>
          <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        <!-- Exibição de mensagem de sucesso -->
        <?php if (isset($_SESSION['success'])): ?>
          <div class="success-message">
            <?php echo $_SESSION['success']; ?>
          </div>
          <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <form method="POST" action="../../controllers/loginAluno.php">
          <div class="textfield">
            <label for="usuario">Usuário</label>
            <input type="text" name="usuario" placeholder="Usuário" required>
          </div>
          <div class="textfield">
            <label for="password">Senha</label>
            <input type="password" name="password" placeholder="Senha" required>
          </div>
          <button class="btn-login" type="submit" name="action" value="login">Login</button>
        </form>

        <div class="login-options">
          <a href="forgot-password.php" class="forgot-password-link">Esqueceu a senha?</a>
          <a href="cadastro.php" class="register-link">Cadastre-se</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>