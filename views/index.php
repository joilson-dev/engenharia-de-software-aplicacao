<?php \Classes\ClassLayout::setHead('Trabalho de Engenharia de Software', 'Desenvolvedores: Fabício, Fábio, Joilson'); ?>

<style>
    body, html{
    height: 100%;
}    
#homepage {
    background-image: linear-gradient(90deg, #4e8cff, #5c59ff, #7465ff);
    height: 100%; 
    padding: 10%;
}

#homemenu {
    background-image: linear-gradient(90deg, #4e8cff, #5c59ff, #7465ff);
    border: 2px solid rgb(255, 255, 255); 
    padding: 10%;
}

#homemenu h1 {
    font-size: 2em;
}

#homemenu a {
    font-size: 2em;
    margin: 10%;
    padding: 5px;
    color: rgb(0, 0, 0);
}

#homemenu p {
    text-align: right;
}
</style>

<div id="homepage">
    <div id="homemenu" class="center">
        <h1 style="margin: 10px;">TRABALHO DE ENGENHARIA DE SOFTWARE</h1>
        <br>
        <a href="<?php echo DIRPAGE . 'cadastro' ?>">Cadastro</a><br>
        <br>
        <a href="<?php echo DIRPAGE . 'login' ?>">Login</a>

        <p>Fabício, Fábio, Joilson</p>
    </div>
</div>
<?php \Classes\ClassLayout::setFooter(); ?>
