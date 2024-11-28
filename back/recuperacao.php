<?php
// Conexão com o banco de dados (substitua as credenciais de acordo com o seu ambiente)
$conn = new mysqli("localhost", "root", "", "educanet");

// Verifique se houve algum erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifique se o formulário de recuperação de senha foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $securityAnswer = $_POST['security-answer'];

    // Consulta para obter a senha correspondente ao email e à resposta de segurança fornecidos
    $sql = "SELECT password FROM cadastro WHERE email = '$email' AND security_answer = '$securityAnswer'";

    // Execute a consulta SQL
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // A resposta de segurança e o email estão corretos, exiba a senha
        $row = $result->fetch_assoc();
        $password = $row['password'];
    } else {
        // A resposta de segurança e/ou o email estão incorretos
        $error = "As informações fornecidas estão incorretas. Por favor, tente novamente.";
    }

    // Feche a conexão com o banco de dados
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>EducaNet | Esqueci a Senha</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-grad-school.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
    <link rel="stylesheet" href="../assets/css/lightbox.css">
</head>

<body>


    <!--header-->
    <header class="main-header clearfix" role="header">
        <div class="logo">
            <a href="../index.html"><em>Educa</em> Net</a>
        </div>
        <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
        <nav id="menu" class="main-nav" role="navigation">
            <ul class="main-menu">
                <li><a href="../index.html">Home</a></li>
                <li class="has-submenu"><a href="index.html#section2">Sobre Nós</a>
                    <ul class="sub-menu">
                        <li><a href="index.html#section2">Quem Somos?</a></li>
                        <li><a href="index.html#section3">Cadastre-se</a></li>
                    </ul>
                </li>
                <li><a href="index.html/#section4">Cursos</a></li>
            </ul>
        </nav>
    </header>

    <section class="section coming-soon" data-section="section3">
        <style>
            section.coming-soon {
                background-image: url(../assets/images/choosing-bg.jpg);
                background-size: cover;
                background-color: #172238;
            }
        </style>
        <br>
        <br>
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <!-- LOGAR -->
                <div class="col-md-6">
                    <div class="right-content">
                        <div class="top-content">
                            <h6>Obtenha sua Senha novamente</h6>
                        </div>
                        <?php
                        ?>
                        <form id="login-form" action="" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="email" type="text" class="form-control" id="email" placeholder="Email cadastrado" required="">
                                    </fieldset>
                                </div>
                                <br>
                                <br>
                                <br>

                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="security-answer" type="text" class="form-control" id="security-answer" placeholder="Qual é o nome do seu animal de estimação?" required="">
                                    </fieldset>
                                </div>
                                <br>
                                <br>
                                <br>
                                <style>
                                    .error {
                                        background-color: #ff0000;
                                    }

                                    .error-message {
                                        color: #ff0000;
                                    }

                                    #password {
                                        background-color: #1A2A40;
                                    }
                                </style>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="password" type="text" class="form-control <?php echo isset($error) ? 'error' : ''; ?>" id="password" placeholder="Sua Senha" value="<?php echo isset($password) ? $password : ''; ?>" disabled>
                                        <?php
                                        if (isset($error)) {
                                            echo "<p class='error-message'>$error</p>";
                                        }
                                        ?>
                                    </fieldset>
                                </div>

                                <div class="col-md-12">
                                    <fieldset>
                                        <button type="submit" id="login-submit" class="button">Recuperar Senha</button>
                                    </fieldset>
                                </div>
                                <br>
                                <br>
                                <br>
                            </div>
                            <a href="../sign/login.php" class="button">Volte a Fazer Login</a><br>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p><i class="fa fa-copyright"></i> EducaNet 2023
                        <!-- N é um Easter Egg tbm -->
                        | Design: <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" rel="sponsored" target="_parent">Hill</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/js/isotope.min.js"></script>
    <script src="../assets/js/owl-carousel.js"></script>
    <script src="../assets/js/lightbox.js"></script>
    <script src="../assets/js/tabs.js"></script>
    <script src="../assets/js/video.js"></script>
    <script src="../assets/js/slick-slider.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
            var
                direction = section.replace(/#/, ''),
                reqSection = $('.section').filter('[data-section="' + direction + '"]'),
                reqSectionPos = reqSection.offset().top - 0;

            if (isAnimate) {
                $('body, html').animate({
                        scrollTop: reqSectionPos
                    },
                    800);
            } else {
                $('body, html').scrollTop(reqSectionPos);
            }

        };

        var checkSection = function checkSection() {
            $('.section').each(function() {
                var
                    $this = $(this),
                    topEdge = $this.offset().top - 80,
                    bottomEdge = topEdge + $this.height(),
                    wScroll = $(window).scrollTop();
                if (topEdge < wScroll && bottomEdge > wScroll) {
                    var
                        currentId = $this.data('section'),
                        reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                    reqLink.closest('li').addClass('active').
                    siblings().removeClass('active');
                }
            });
        };

        $('.main-menu, .scroll-to-section').on('click', 'a', function(e) {
            if ($(e.target).hasClass('external')) {
                return;
            }
            e.preventDefault();
            $('#menu').removeClass('active');
            showSection($(this).attr('href'), true);
        });

        $(window).scroll(function() {
            checkSection();
        });
    </script>
</body>

</html>