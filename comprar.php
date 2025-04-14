<?php
session_start(); // Inicia a sessão
require_once "conexao.php";

// Redireciona para cadastro se o usuário não estiver logado
if (!isset($_SESSION["usuario_id"])) {
    header("Location: ../cadastro.php");
    exit;
}

// Verifica se foi passado um ID de livro válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idLivro = intval($_GET['id']);

    // Agora pegamos também o campo 'imagem'
    $stmt = $pdo->prepare("SELECT titulo, preco, imagem FROM livros WHERE id = ?");
    $stmt->execute([$idLivro]);
    $livro = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($livro) {
        // Adiciona o livro ao carrinho (na sessão)
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }

        if (isset($_SESSION['carrinho'][$idLivro])) {
            $_SESSION['carrinho'][$idLivro]['quantidade'] += 1;
        } else {
            $_SESSION['carrinho'][$idLivro] = [
                'titulo' => $livro['titulo'],
                'preco' => $livro['preco'],
                'imagem' => $livro['imagem'],
                'quantidade' => 1
            ];
        }

        // Define a notificação de sucesso via sessão
        $_SESSION['notification_message'] = "Livro adicionado ao carrinho com sucesso!";
        header("Location: cart.php");
        exit();
    } else {
        // Define notificação de erro (livro não encontrado)
        $_SESSION['notification_message'] = "Livro não encontrado.";
        header("Location: index.php");
        exit();
    }
} else {
    // Define notificação de erro (ID inválido)
    $_SESSION['notification_message'] = "ID de livro inválido!";
    header("Location: index.php");
    exit();
}
?>
