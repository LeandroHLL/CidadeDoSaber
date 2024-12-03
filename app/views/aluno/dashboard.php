<?php include '../common/header.php'; ?>
<div class="container">
    <h1>Bem-vindo, <?php echo $alunoNome; ?>!</h1>
    <p>Veja seus cursos e histórico abaixo:</p>
    <!-- Lista de cursos -->
    <?php foreach ($cursos as $curso): ?>
        <div class="course">
            <h3><?php echo $curso['nome']; ?></h3>
            <p>Status: <?php echo $curso['status']; ?></p>
        </div>
    <?php endforeach; ?>
</div>
<?php include '../common/footer.php'; ?>
