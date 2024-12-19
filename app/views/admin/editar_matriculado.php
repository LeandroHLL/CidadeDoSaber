<?php
// Conectar ao banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=educanet', 'root', '123456cds');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "
        SELECT 
            a.cod_aluno, 
            a.nome_aluno, 
            a.email, 
            a.cpf,       
            a.telefone_celular,
            a.data_nascimento,
            a.endereco,
            a.numero_endereco
        FROM aluno a
        WHERE a.cod_aluno = :id
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$aluno) {
        die("Aluno não encontrado.");
    }
} else {
    die("ID do aluno não informado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar os dados do formulário
    $nome_aluno = $_POST['nome_aluno'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $telefone_celular = $_POST['telefone_celular'];
    $data_nascimento = $_POST['data_nascimento'];
    $endereco = $_POST['endereco'];
    $numero_endereco = $_POST['numero_endereco'];

    $update_sql = "
        UPDATE aluno
        SET 
            nome_aluno = :nome_aluno,
            email = :email,
            cpf = :cpf,
            telefone_celular = :telefone_celular,
            data_nascimento = :data_nascimento,
            endereco = :endereco,
            numero_endereco = :numero_endereco
        WHERE cod_aluno = :id
    ";

    $update_stmt = $pdo->prepare($update_sql);
    $update_stmt->bindParam(':nome_aluno', $nome_aluno);
    $update_stmt->bindParam(':email', $email);
    $update_stmt->bindParam(':cpf', $cpf);
    $update_stmt->bindParam(':telefone_celular', $telefone_celular);
    $update_stmt->bindParam(':data_nascimento', $data_nascimento);
    $update_stmt->bindParam(':endereco', $endereco);
    $update_stmt->bindParam(':numero_endereco', $numero_endereco);
    $update_stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $update_stmt->execute();

    header("Location: adminalunos.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Matriculado</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="../../../public/css/templatemo-grad-school.css" rel="stylesheet">
</head>

<body class="bg-gray-100 h-screen flex overflow-hidden">
    <header class="main-header clearfix" role="header">
        <div class="logo">
            <a href="../../../index.html"><em>Educa</em> Net</a>
        </div>
        <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
        <nav id="menu" class="main-nav" role="navigation">
            <ul class="main-menu">
                <li><a href="dashboard.php">Matriculas</a></li>
                <li><a href="adminalunos.php">Alunos</a></li>
                <li><a style="color: red;" href="../admin/loginadm.php" rel="sponsored" class="external">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main class="flex-1 p-6 overflow-y-auto pt-20">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Editar Matriculado</h1>
        </div>

        <form method="POST">
            <div class="bg-white rounded-lg shadow overflow-hidden p-6">
                <div class="space-y-4">
                    <div>
                        <label for="nome_aluno" class="block text-sm font-medium text-gray-600">Nome</label>
                        <input type="text" id="nome_aluno" name="nome_aluno" value="<?= htmlspecialchars($aluno['nome_aluno']) ?>" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                        <input type="email" id="email" name="email" value="<?= htmlspecialchars($aluno['email']) ?>" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                    </div>
                    <div>
                        <label for="cpf" class="block text-sm font-medium text-gray-600">CPF</label>
                        <input type="text" id="cpf" name="cpf" value="<?= htmlspecialchars($aluno['cpf']) ?>" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                    </div>
                    <div>
                        <label for="telefone_celular" class="block text-sm font-medium text-gray-600">Telefone Celular</label>
                        <input type="text" id="telefone_celular" name="telefone_celular" value="<?= htmlspecialchars($aluno['telefone_celular']) ?>" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                    </div>
                    <div>
                        <label for="data_nascimento" class="block text-sm font-medium text-gray-600">Data de Nascimento</label>
                        <input type="date" id="data_nascimento" name="data_nascimento" value="<?= htmlspecialchars($aluno['data_nascimento']) ?>" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                    </div>
                    <div>
                        <label for="endereco" class="block text-sm font-medium text-gray-600">Endereço</label>
                        <input type="text" id="endereco" name="endereco" value="<?= htmlspecialchars($aluno['endereco']) ?>" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                    </div>
                    <div>
                        <label for="numero_endereco" class="block text-sm font-medium text-gray-600">Número do Endereço</label>
                        <input type="text" id="numero_endereco" name="numero_endereco" value="<?= htmlspecialchars($aluno['numero_endereco']) ?>" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md">Salvar Alterações</button>
                    </div>
                </div>
            </div>
        </form>
    </main>
</body>

</html>