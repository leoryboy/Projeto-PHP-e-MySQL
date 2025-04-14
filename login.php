<?php
session_start(); // Inicia a sessão
require_once 'conexao.php'; // Conecta ao banco de dados

// Verifica se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados enviados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Busca o usuário pelo e-mail
    $sql = "SELECT id, senha FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);

    // Armazena os dados do usuário encontrado
    $usuario = $stmt->fetch();

    // Verifica se o usuário existe e se a senha está correta
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // Salva os dados na sessão
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_email'] = $email;

        // Redireciona para a página inicial
        header("Location: index.php");
        exit;
    } else {
        // Caso as credenciais estejam erradas, mostra erro
        $erro = "E-mail ou senha inválidos.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="shortcut icon" href="assets/favicon6.ico" type="image/x-icon">
</head>
<body>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"><img src="assets/img/fotocadastro.jpg" alt="Foto de Capa"></div>
            <form method="post">
                <h2 class="text-center"><strong>GL Books</strong></h2>
                <?php if (!empty($erro)) { echo "<div class='alert alert-danger'>$erro</div>"; } ?>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="E-mail" required></div>
                <div class="form-group"><input class="form-control" type="password" name="senha" placeholder="Senha" required></div>

                <div class="form-group">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" required> Concordo com os termos da licença.</label></div>
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Entrar</button></div>
                <div class="already">Você ainda não tem uma conta? <a href="cadastro.php" class="link">Cadastre-se.</a></div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
