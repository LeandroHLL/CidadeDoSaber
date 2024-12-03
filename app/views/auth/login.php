<?php include '../common/header.php'; ?>
<h2>Login</h2>
<form action="/login" method="post">
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Entrar</button>
</form>
<?php include '../common/footer.php'; ?>
