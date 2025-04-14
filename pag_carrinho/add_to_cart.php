<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION["usuario_id"])) {
    // Mensagem de erro para notificar o usuário
    $_SESSION['notification_message'] = "Você precisa estar logado para comprar!";
    // Redirecionar para a página de carrinho ou página de login
    header('Location: ../pag_carrinho/cart.php');
    exit;
}

// Se o usuário estiver logado, processa a adição ao carrinho
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'] ?? 1;

// Verifica se já existe o item no carrinho
$encontrado = false;
foreach ($_SESSION['carrinho'] as &$item) {
    if ($item['id'] == $id) {
        $item['quantidade'] += $quantidade;
        $encontrado = true;
        break;
    }
}
unset($item); // boa prática

if (!$encontrado) {
    $_SESSION['carrinho'][] = [
        'id' => $id,
        'titulo' => $titulo,
        'preco' => $preco,
        'quantidade' => $quantidade,
        'imagem' => $livro['imagem']
    ];
}

header("Location: ../pag_carrinho/cart.php");
exit;
?>
