<?php
$to = "la000476@gmail.com";
$subject = "Teste de envio";
$message = "Essa é uma mensagem de teste.";
$headers = "From: youremail@gmail.com";

if (mail($to, $subject, $message, $headers)) {
    echo "E-mail enviado com sucesso!";
} else {
    echo "Falha no envio do e-mail.";
}
?>
