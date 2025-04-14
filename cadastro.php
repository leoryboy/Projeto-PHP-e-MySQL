<?php
session_start(); // Inicia a sessão
require_once 'conexao.php'; // Conecta ao banco de dados

// Verifica se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados enviados do formulário
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['password-repeat'];

    // Verifica se as senhas digitadas são iguais
    if ($password !== $passwordRepeat) {
        echo "<script>alert('As senhas não coincidem.');</script>";
    } else {
        // Criptografa a senha antes de salvar no banco
        $senhaSegura = password_hash($password, PASSWORD_DEFAULT);

        // Verifica se o e-mail já está cadastrado no banco
        $sql = "SELECT id FROM usuarios WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $email]);

        // Se o e-mail já existir, exibe alerta
        if ($stmt->rowCount() > 0) {
            echo "<script>alert('E-mail já está cadastrado.');</script>";
        } else {
            // Insere o novo usuário no banco
            $sql = "INSERT INTO usuarios (email, senha) VALUES (:email, :senha)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':email' => $email,
                ':senha' => $senhaSegura
            ]);

            // Exibe mensagem de sucesso e redireciona para o login
            echo "<script>alert('Cadastro realizado com sucesso! Faça o login.'); window.location.href = 'login.php';</script>";
            exit;
        }
    }
}
?>

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="shortcut icon" href="assets/favicon6.ico" type="image/x-icon">
</head>

<body>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"><img src="assets/img/fotocadastro.jpg" alt="Foto de Capa"></div>
            <form method="post">
                <h2 class="text-center"><strong>Criar</strong> uma conta.</h2>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="E-mail" required></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Senha" required></div>
                <div class="form-group"><input class="form-control" type="password" name="password-repeat" placeholder="Senha (repetir)" required></div>
                <div class="form-group">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" required> Concordo com os termos da licença.</label></div>
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Inscrever-se</button></div>
                <div class="already">Você já tem uma conta? <a href="login.php" class="link">Faça o login.</a></div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
