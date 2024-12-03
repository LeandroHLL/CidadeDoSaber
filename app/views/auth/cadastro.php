<?php include '../common/header.php'; ?>
<h2>Cadastro</h2>
<form action="/cadastro" method="post">
    <input type="text" name="nome" placeholder="Nome completo" required>
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Cadastrar</button>
</form>
<?php include '../common/footer.php'; ?>
