<?php \Classes\ClassLayout::setHead('Login', 'Entre com seu Login e Senha'); ?>

<div class="fundo"></div>
<form name="formLogin" id="formLogin" action="<?php echo DIRPAGE . 'controllers/controllerLogin'; ?> " method="post">

    <div class="login">

        <div class="loginLogomarca float w100 center">
            <img src="<?php echo DIRPAGE.'img/logoMarca4.png' ?>" alt="Logomarca">
        </div>

        <div class="resultadoForm float w100 center"></div>

        <div class="loginFormulario float w100">

            <input class="float w100 h40" type="email" name="email" id="email" placeholder="Email:" required>
            <input class="float w100 h40" type="password" name="senha" id="senha" placeholder="Senha:" required>
            <input class="float w100 h40 " type="hidden" name="g-recaptcha-response" id="g-recaptcha-response" required>
            <input class="float h40 center" type="submit" value="Entrar">

            <div class="loginTexto float center">
                <a href="<?php echo DIRPAGE.'esqueci-minha-senha' ?>">Esqueci minha senha</a>
            </div>

        </div>

    </div>

</form>

<?php \Classes\ClassLayout::setFooter(); ?>