<!-- Bloco PHP para enviar o e-mail -->
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta e sanitização dos dados
    $nome = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $telefone = htmlspecialchars($_POST["phone"]);
    $mensagem = htmlspecialchars($_POST["message"]);

    // Instância do PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuração do servidor SMTP (Gmail)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'la000476@gmail.com'; // Seu e-mail Gmail
        $mail->Password = 'xofvrcgzopnrdthb'; // Senha de App do Google
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Remetente e destinatário
        $mail->setFrom('la000476@gmail.com', 'Formulário GLBooks');
        $mail->addAddress('la000476@gmail.com'); // Pode usar o mesmo e-mail

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Novo contato pelo site GLBooks';
        $mail->Body = "
            <strong>Nome:</strong> $nome<br>
            <strong>Email:</strong> $email<br>
            <strong>Telefone:</strong> $telefone<br>
            <strong>Mensagem:</strong><br>$mensagem
        ";

        $mail->send();
        $sucesso = "Mensagem enviada com sucesso!";
    } catch (Exception $e) {
        $erro = "Erro ao enviar: {$mail->ErrorInfo}";
    }
}
?>

<!-- Código HTML do formulário de contato -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contato</title>
    <link rel="icon" href="assets/favicon4.ico">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">GL Books</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
                Menu <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contato</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart carrinho-icone"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
        <div class="container text-center">
            <h1>Entre em contato conosco</h1>
            <p>Tem perguntas? Eu tenho respostas.</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php if (isset($sucesso)) echo "<div class='alert alert-success'>$sucesso</div>"; ?>
                <?php if (isset($erro)) echo "<div class='alert alert-danger'>$erro</div>"; ?>

                <p>Preencha o formulário abaixo e entraremos em contato o mais breve possível!</p>

                <form action="contact.php" method="post">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="name" name="name" type="text" placeholder="Nome" required>
                        <label for="name">Nome</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" name="email" type="email" placeholder="E-mail" required>
                        <label for="email">E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="phone" name="phone" type="tel" placeholder="Telefone" required>
                        <label for="phone">Telefone</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="message" name="message" placeholder="Mensagem" style="height: 12rem" required></textarea>
                        <label for="message">Mensagem</label>
                    </div>
                    <button class="btn btn-primary text-uppercase" type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </main>

   <!-- Footer -->
   <footer class="border-top mt-5">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#"><span class="fa-stack fa-lg"><i class="fas fa-circle fa-stack-2x"></i><i class="fab fa-twitter fa-stack-1x fa-inverse"></i></span></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><span class="fa-stack fa-lg"><i class="fas fa-circle fa-stack-2x"></i><i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i></span></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><span class="fa-stack fa-lg"><i class="fas fa-circle fa-stack-2x"></i><i class="fab fa-github fa-stack-1x fa-inverse"></i></span></a>
                        </li>
                    </ul>
                    <div class="small text-center text-muted fst-italic">Copyright &copy; GL Books 2025</div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
