<?php // esse bloco é o que faz o "Sair" funcionar — limpa os dados da sessão e redireciona o usuário pra home.
session_start();
session_unset(); // Remove todas as variáveis da sessão
session_destroy(); // Destroi a sessão
header("Location: index.php"); // Redireciona para a home
exit();
