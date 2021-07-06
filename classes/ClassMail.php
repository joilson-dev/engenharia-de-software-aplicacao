<?php

namespace Classes;

class ClassMail
{
    #Envio de email
    public function sendMail($email, $nome, $token = null, $assunto, $corpoEmail)
    {
        try {
            mail($email, $assunto, $corpoEmail, $nome);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}


/*
<?php
$to_email = "zarina2688@uorak.com"; // email destinatario 
$subject = "Uma mensagem de teste"; // resumo
$body = "Testando o envio de uma email pelo local host usando PHP script"; // conteudo
$headers = "From: Teste de email para o fabio"; //titulo
 
if (mail($to_email, $subject, $body, $headers)) {
    echo "Email enviado com sucesso para $to_email.";
} else {
    echo "Falha no envio do email.";
}
?>
*/