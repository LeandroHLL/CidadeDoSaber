<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/stylesign.css">
    <title>Cadastro</title>
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
    </style>
</head>
<?php 
include '../common/header.php'; 
session_start();
?>
<body>
    <div class="main-login">
        <div class="right-login">
            <div class="card-login">
                <h1>Cadastro</h1>
                    <!-- Exibição de mensagem de erro -->
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="error-message">
                        <?php echo $_SESSION['error']; ?>
                    </div>
                <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
                <form action="../../controllers/cadastroAluno.php" method="POST">
                    <div class="textfield">
                        <label for="nome">Nome Completo</label>
                        <input type="text" name="nome" placeholder="Digite seu nome" required>
                    </div>
                    <div class="textfield">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>
                    <div class="textfield">
                        <label for="usuario">Numero de telefone</label>
                        <input type="tel" name="numero" placeholder="Digite seu numero de telefone" required>
                    </div>
                    <div class="textfield">
                        <label for="password">Senha</label>
                        <input type="password" name="password" placeholder="Digite sua senha" required>
                    </div>
                    <div class="textfield">
                        <label for="confirm-password">Confirme a Senha</label>
                        <input type="password" name="confirm-password" placeholder="Confirme sua senha" required>
                    </div>
                    <button class="btn-login" type="submit">Cadastrar</button>
                </form>
                <div class="login-options">
                    <a href="login.php" class="forgot-password-link">Já tem uma conta? Faça login</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>