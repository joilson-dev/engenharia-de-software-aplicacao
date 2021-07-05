<?php \Classes\ClassLayout::setHead('Cadastro', 'Realizer seu cadastro'); ?>

    <div class="topFaixa float w100 center">
        Cadastro de Cliente
    </div>

    <div class="retornoCad">
    
    </div>

    <form name="formCadastro" id="formCadastro" action="<?php echo DIRPAGE.'controllers/controllerCadastro' ?>" method="post">
        <div class="cadastro float center">
            <input class="float w100 h40 " type="text" name="nome" id="nome" placeholder="Nome:" required>
            <input class="float w100 h40 " type="email" name="email" id="email" placeholder="Email:" required>
            <input class="float w100 h40 " type="text" name="cpf" id="cpf" placeholder="CPF:" required>
            <input class="float w100 h40 " type="text" name="dataNascimento" id="dataNascimento" placeholder="Data de Nascimento:" required>
            <input class="float w100 h40 " type="password" name="senha" id="senha" placeholder="Senha:" required>
            <input class="float w100 h40 " type="password" name="senhaConf" id="senhaConf" placeholder="Confirmação da Senha:" required>
            <input class="float w100 h40 " type="hidden" name="g-recaptcha-response" id="g-recaptcha-response" required>
            <input class="inlineBlock h40 " type="submit" value="Cadastrar">
        </div>
    </form>

<?php \Classes\ClassLayout::setFooter(); ?>