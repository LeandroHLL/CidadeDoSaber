<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status de Matrícula</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex overflow-hidden">
    <main class="flex-1 p-6 overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Status das Matrículas</h1>
        </div>

        <!-- Tabela de Status de Matrículas -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6">
                <table class="w-full table-auto text-left">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">ID Matrícula</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">Nome Aluno</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">Email</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">Curso</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">CPF</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">Endereço</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">Status</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($matriculas) > 0) {
                            foreach ($matriculas as $matricula) {
                                echo "<tr class='border-b'>";
                                echo "<td class='px-4 py-2'>{$matricula['id_matricula']}</td>";
                                echo "<td class='px-4 py-2'>{$matricula['nome_aluno']}</td>";
                                echo "<td class='px-4 py-2'>{$matricula['email']}</td>";
                                echo "<td class='px-4 py-2'>{$matricula['curso_nome']}</td>";
                                echo "<td class='px-4 py-2'>{$matricula['cpf']}</td>";
                                echo "<td class='px-4 py-2'>{$matricula['endereco']}</td>";
                                echo "<td class='px-4 py-2'>";
                                switch ($matricula['matricula_status']) {
                                    case 'Aprovado':
                                        echo "<span class='text-green-500 font-semibold'>Aprovado</span>";
                                        break;
                                    case 'Andamento':
                                        echo "<span class='text-yellow-500 font-semibold'>Andamento</span>";
                                        break;
                                    case 'Recusado':
                                        echo "<span class='text-red-500 font-semibold'>Recusado</span>";
                                        break;
                                    default:
                                        echo "<span class='text-gray-500'>Não especificado</span>";
                                        break;
                                }
                                echo "</td>";

                                // Formulário para alterar o status
                                echo "<td class='px-4 py-2'>";
                                echo "<form method='POST' action='' class='flex items-center gap-2'>";
                                echo "<input type='hidden' name='id_matricula' value='{$matricula['id_matricula']}'>";
                                echo "<select name='status' class='bg-gray-200 p-2 rounded text-sm'>";
                                echo "<option value='Aprovado'" . ($matricula['matricula_status'] == 'Aprovado' ? ' selected' : '') . ">Aprovado</option>";
                                echo "<option value='Andamento'" . ($matricula['matricula_status'] == 'Andamento' ? ' selected' : '') . ">Andamento</option>";
                                echo "<option value='Recusado'" . ($matricula['matricula_status'] == 'Recusado' ? ' selected' : '') . ">Recusado</option>";
                                echo "</select>";
                                echo "<button type='submit' class='bg-blue-500 text-white p-2 rounded text-sm'>Atualizar</button>";
                                echo "</form>";
                                echo "</td>";

                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center py-4'>Nenhuma matrícula encontrada.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
