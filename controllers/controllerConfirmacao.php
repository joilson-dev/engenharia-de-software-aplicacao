<?php
$email = \Traits\TraitParseUrl::parseUrl(2);
$token = \Traits\TraitParseUrl::parseUrl(3);
//echo $email . "<br>" . $token;
$confirmation = new \Models\ClassCadastro();

if ($confirmation->confirmationCad($email, $token)) {
    echo "
        <script>
        alert('Dados confirmados com sucesso!');
        window.location.href='" . DIRPAGE . "login';
        </script>
    ";
} else {
    echo "
        <script>
        alert('Não foi possível confirmar seus dados!');
        window.location.href='" . DIRPAGE . "';
        </script>
    ";
}
