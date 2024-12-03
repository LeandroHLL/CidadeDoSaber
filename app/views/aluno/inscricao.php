<?php include '../common/header.php'; ?>
<h2>Inscrição em Cursos</h2>
<form action="/inscricao" method="post">
    <label for="curso">Selecione o curso:</label>
    <select name="curso" id="curso">
        <option value="teatro">Curso de Teatro</option>
        <option value="danca">Curso de Dança</option>
    </select>
    <button type="submit">Inscrever-se</button>
</form>
<?php include '../common/footer.php'; ?>
