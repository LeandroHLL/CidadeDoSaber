<?php
$pdo = new PDO('mysql:host=localhost;dbname=educanet', 'root', '123456cds');

$sql = "
    SELECT 
        a.cod_aluno, 
        a.nome_aluno, 
        a.email, 
        a.cpf,       
        c.username, 
        c.age, 
        c.phone_number
    FROM aluno a
    INNER JOIN cadastro c ON a.email = c.email
    WHERE a.email IS NOT NULL AND c.email IS NOT NULL
";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos Matriculados</title>
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
            <h1 class="text-3xl font-bold">Matriculados</h1>
        </div>

        <!-- Barra de Pesquisa e Filtro -->
        <div class="mb-4">
            <div class="flex items-center space-x-4">
                <input id="search" type="text" placeholder="Buscar..." class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                <select id="filter" class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                    <option value="">Filtrar por Status</option>
                    <option value="pendente">Pendente</option>
                    <option value="concluida">Concluída</option>
                    <option value="cancelada">Cancelada</option>
                </select>
            </div>
        </div>

        <!-- Tabela de Status de Matrículas -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6">
                <table id="enrollmentTable" class="w-full table-auto text-left">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">ID Matrícula</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">Nome Aluno</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">Email</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">CPF</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($alunos as $aluno) : ?>
                            <tr>
                                <td class="px-4 py-2"><?= htmlspecialchars($aluno['cod_aluno']) ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($aluno['nome_aluno']) ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($aluno['email']) ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($aluno['cpf']) ?></td>
                                <td class="px-4 py-2">
                                    <a href="atualizar_status.php?id=<?= $aluno['cod_aluno'] ?>&status=ativo" class="text-green-500 hover:underline">Editar Matriculado</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('search');
            const filterSelect = document.getElementById('filter');
            const table = document.getElementById('enrollmentTable');
            const rows = table.querySelectorAll('tbody tr');

            function filterTable() {
                const searchText = searchInput.value.toLowerCase();
                const filterStatus = filterSelect.value.toLowerCase();

                rows.forEach(row => {
                    const rowText = row.textContent.toLowerCase();
                    const rowStatus = row.querySelector('td:nth-child(6)').textContent.toLowerCase();

                    const matchesSearch = rowText.includes(searchText);
                    const matchesFilter = !filterStatus || rowStatus.includes(filterStatus);

                    if (matchesSearch && matchesFilter) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            searchInput.addEventListener('input', filterTable);
            filterSelect.addEventListener('change', filterTable);
        });
    </script>
</body>

</html>