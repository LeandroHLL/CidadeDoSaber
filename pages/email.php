<!-- Ia ser responsavel por enviar mensagens por email, porém vou usar o mailto, para n ser necessário trocar o index de html para php -->
          <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $_POST['message'];

                $destinatario = "l.lima@ba.estudane.senai.br";

                $assunto = "Nova mensagem do formulário de contato";

                $corpo_email = "Nome: " . $name . "\n";
                $corpo_email .= "Email: " . $email . "\n";
                $corpo_email .= "Mensagem: " . $message;

                if (mail($destinatario, $assunto, $corpo_email)) {
                    echo "Mensagem enviada com sucesso!";
                } else {
                    echo "Ocorreu um erro ao enviar a mensagem.";
                }
            }
            ?>