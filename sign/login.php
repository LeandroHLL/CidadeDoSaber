<?php
// Iniciar sessão
session_start();

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "educanet";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi estabelecida corretamente
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Função para verificar o login
function verificaLogin($conn, $username, $password)
{
    // Consulta SQL para verificar o usuário e a senha no banco de dados
    $sql = "SELECT * FROM cadastro WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login bem-sucedido, definir variáveis de sessão
        $row = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $row['username'];

        // Redirecionar para a página de sucesso após o login
        header("Location: sucesso.php");
        exit();
    } else {
        // Login inválido, redirecionar para a página de login com um erro
        header("Location: login.php?error=1");
        exit();
    }
}

// Verificar se o formulário de login foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Chamar a função de verificação de login
    verificaLogin($conn, $username, $password);
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

    <title>EducaNet | Login</title>

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
                <style>
                    .ola {
                        color: white;
                    }

                    .username {
                        color: #F29727;
                    }
                </style>
                <?php if (isset($_SESSION['username'])) : ?>
                    <a>
                        <li class="username">
                            <span class="ola">Olá </span>
                            <?php echo $_SESSION['username']; ?>
                        </li>
                    </a>
                <?php endif; ?>
                <style>
                    .external {
                        color: #F29727;
                    }
                </style>
                <?php if (isset($_SESSION['username']) && $_SESSION['username'] === $username) {
                    echo '<li><a href="../pages/yourpage.php" rel="sponsored" class="external">Sua Página</a></li>';
                } ?>
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
                background-image: url(../assets/images/main-slider-02.jpg);
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
                            <h6>Faça login em sua conta</h6>
                        </div>
                        <form id="login-form" action="" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="username" type="text" class="form-control" id="username" placeholder="Usuário" required="">
                                    </fieldset>
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>

                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="password" type="password" class="form-control" id="password" placeholder="Senha" required="">
                                        <?php
                                        // Verifica se há um erro na URL/tratamento de erros
                                        if (isset($_GET['error'])) {
                                            $error = $_GET['error'];

                                            if ($error == 1) {
                                                echo "<p style='color: red;'>Usuário ou senha inválidos!</p>";
                                            } else {
                                                echo "<p style='color: red;'>Ocorreu um erro no login.</p>";
                                            }
                                        }
                                        ?>
                                    </fieldset>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="col-md-12">
                                    <fieldset>
                                        <button type="submit" id="login-submit" class="button">Logar</button>
                                    </fieldset>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="col-md-12">
                                    <fieldset>
                                        <a href="../back/recuperacao.php" class="button">Esqueceu a Senha?</a><br>
                                        <a href="cadastro.php" class="button">Não é cadastrado? se cadastre.</a>
                                    </fieldset>
                                </div>
                            </div>
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