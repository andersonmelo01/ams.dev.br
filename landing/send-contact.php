<?php
// Arquivo: send-contact.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = isset($_POST['nome']) ? strip_tags($_POST['nome']) : '';
    $email = isset($_POST['email']) ? strip_tags($_POST['email']) : '';
    $telefone = isset($_POST['telefone']) ? strip_tags($_POST['telefone']) : '';
    $mensagem = isset($_POST['mensagem']) ? strip_tags($_POST['mensagem']) : '';
    $extra = isset($_POST['extra']) ? strip_tags($_POST['extra']) : '';

    if (empty($nome) || empty($email)) {
        echo 'ERRO: Preencha nome e e-mail.';
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'ERRO: E-mail inválido.';
        exit;
    }

    $to = 'amssistemas95@gmail.com';
    $subject = 'Contato via formulário do site';
    $body = "Nome: $nome\nE-mail: $email\nTelefone: $telefone\nMensagem: $mensagem\nExtra: $extra";
    $headers = "From: contato@ams.dev.br\r\nReply-To: $email\r\n";

    // Diagnóstico: mostrar erro do mail() se falhar
    if (mail($to, $subject, $body, $headers)) {
        echo 'OK';
    } else {
        error_log('Erro ao enviar e-mail: ' . print_r(error_get_last(), true));
        echo 'ERRO: Falha ao enviar. Verifique se a função mail() está habilitada no servidor.';
    }
    exit;
}
?>