<?php
session_start();

// Verifica se o ID foi passado
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verifica se o item existe no carrinho e remove
    if (isset($_SESSION['carrinho'][$id])) {
        unset($_SESSION['carrinho'][$id]);

        // Adiciona uma mensagem de sucesso
        $_SESSION['message'] = "Item removido com sucesso!";
    } else {
        $_SESSION['message'] = "Item não encontrado no carrinho.";
    }
}

// Redireciona de volta para o carrinho
header("Location: ../cart.php");
exit;
