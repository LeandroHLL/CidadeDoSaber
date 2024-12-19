<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    <link rel="stylesheet" href="../../../public/css/css.css">
</head>

<body class="align">

    <div class="grid">
        <form method="POST" action="../../controllers/adminCadastroAluno.php" class="form login">
            <h2>Cadastro de Aluno</h2>

            <!-- Mensagem de erro (se houver) -->
            <?php
            session_start();
            if (isset($_SESSION['error'])): ?>
                <div class="error-message">
                    <?= $_SESSION['error']; ?>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <!-- Nome do aluno -->
            <div class="form__field">
                <label for="nome_aluno">Nome do Aluno</label>
                <input id="nome_aluno" type="text" name="nome_aluno" class="form__input" placeholder="Nome do Aluno" required>
            </div>

            <!-- Data de nascimento -->
            <div class="form__field">
                <label for="data_nascimento">Data de Nascimento</label>
                <input id="data_nascimento" type="date" name="data_nascimento" class="form__input" required>
            </div>

            <!-- Nome do Pai -->
            <div class="form__field">
                <label for="nome_pai">Nome do Pai</label>
                <input id="nome_pai" type="text" name="nome_pai" class="form__input" placeholder="Nome do Pai" required>
            </div>

            <!-- Nome da Mãe -->
            <div class="form__field">
                <label for="nome_mae">Nome da Mãe</label>
                <input id="nome_mae" type="text" name="nome_mae" class="form__input" placeholder="Nome da Mãe" required>
            </div>

            <!-- Sexo -->
            <div class="form__field">
                <label for="sexo">Sexo</label>
                <select id="sexo" name="sexo" class="form__input" required>
                    <option value="">Selecione</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Outro">Outro</option>
                </select>
            </div>

            <!-- CPF -->
            <div class="form__field">
                <label for="cpf">CPF</label>
                <input id="cpf" type="text" name="cpf" class="form__input" placeholder="CPF" required>
            </div>

            <!-- Email -->
            <div class="form__field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" class="form__input" placeholder="Email" required>
            </div>

            <!-- Telefone Celular -->
            <div class="form__field">
                <label for="telefone_celular">Telefone Celular</label>
                <input id="telefone_celular" type="text" name="telefone_celular" class="form__input" placeholder="Telefone Celular" required>
            </div>

            <!-- Endereço -->
            <div class="form__field">
                <label for="endereco">Endereço</label>
                <input id="endereco" type="text" name="endereco" class="form__input" placeholder="Endereço" required>
            </div>

            <!-- Número do Endereço -->
            <div class="form__field">
                <label for="numero_endereco">Número do Endereço</label>
                <input id="numero_endereco" type="text" name="numero_endereco" class="form__input" placeholder="Número do Endereço" required>
            </div>

            <!-- Escolaridade -->
            <div class="form__field">
                <label for="serie_escolar">Série Escolar</label>
                <input id="serie_escolar" type="text" name="serie_escolar" class="form__input" placeholder="Série Escolar" required>
            </div>

            <!-- Turno Escolar -->
            <div class="form__field">
                <label for="turno_escolar">Turno Escolar</label>
                <select id="turno_escolar" name="turno_escolar" class="form__input" required>
                    <option value="">Selecione</option>
                    <option value="Manhã">Manhã</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noite">Noite</option>
                </select>
            </div>

            <!-- Possui Alergia -->
            <div class="form__field">
                <label for="possui_alergia">Possui Alergia?</label>
                <select id="possui_alergia" name="possui_alergia" class="form__input" required>
                    <option value="Não">Não</option>
                    <option value="Sim">Sim</option>
                </select>
            </div>

            <!-- Qual Alergia -->
            <div class="form__field">
                <label for="qual_alergia">Qual Alergia?</label>
                <input id="qual_alergia" type="text" name="qual_alergia" class="form__input" placeholder="Qual Alergia?" required>
            </div>

            <!-- Ex-Aluno -->
            <div class="form__field">
                <label for="ex_aluno">Ex-Aluno?</label>
                <select id="ex_aluno" name="ex_aluno" class="form__input" required>
                    <option value="Não">Não</option>
                    <option value="Sim">Sim</option>
                </select>
            </div>

            <!-- Observações -->
            <div class="form__field">
                <label for="obs">Observações</label>
                <textarea id="obs" name="obs" class="form__input" placeholder="Observações"></textarea>
            </div>

            <!-- Submit -->
            <div class="form__field">
                <input type="submit" name="action" value="Cadastrar">
            </div>
        </form>

    </div>

    <!-- Ícones -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icons">
        <symbol id="icon-user" viewBox="0 0 1792 1792">
            <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
        </symbol>
        <symbol id="icon-lock" viewBox="0 0 1792 1792">
            <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
        </symbol>
    </svg>
</body>

</html>
