<?php
// PHPMailer - Envio SMTP para formulário de contato
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';
require __DIR__ . '/PHPMailer/src/Exception.php';

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

    $mail = new PHPMailer(true);
    try {
        // Configurações do servidor SMTP (exemplo Gmail)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'amssistemas95@gmail.com'; // Seu e-mail Gmail
        $mail->Password = 'ciqywjgfuuurcppk'; // Senha de app do Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Remetente e destinatário
        $mail->setFrom('SEU_EMAIL@gmail.com', 'Site AMS');
        $mail->addAddress('amssistemas95@gmail.com');
        $mail->addReplyTo($email, $nome);

        // Remetente e destinatário
        $mail->setFrom('contato@ams.dev.br', 'Site AMS');
        $mail->addAddress('amssistemas95@gmail.com');
        $mail->addReplyTo($email, $nome);

        // Conteúdo
        $mail->isHTML(false);
        $mail->Subject = 'Contato via formulário do site';
        $mail->Body = "Nome: $nome\nE-mail: $email\nTelefone: $telefone\nMensagem: $mensagem\nExtra: $extra";

        $mail->send();
        echo 'OK';
    } catch (Exception $e) {
        error_log('Erro PHPMailer: ' . $mail->ErrorInfo);
        echo 'ERRO: Não foi possível enviar. [' . $mail->ErrorInfo . ']';
    }
    exit;
}
?>
