<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Destinatário (seu e-mail da hospedagem)
    $para = "lead@novomktbrasil.com.br"; 
    $assunto = "Nova Lead - Landing Page";

    // 2. Coleta dos dados do formulário
    $nome = strip_tags(trim($_POST["name"]));
    $whatsapp = strip_tags(trim($_POST["phone"]));
    $mensagem = "Nome: $nome \nWhatsApp: $whatsapp";

    // 3. Cabeçalhos do e-mail
    $headers = "From: contato@novomktbrasil.com.br" . "\r\n" .
               "Reply-To: $para" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // 4. Envio real
    if (mail($para, $assunto, $mensagem, $headers)) {
        // Redireciona para a página de obrigado
        header("Location: obrigado.html");
        exit();
    } else {
        echo "Erro ao enviar sua solicitação. Por favor, tente novamente.";
    }
}
?>