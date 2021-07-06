<?php
#Caminho absolutos
$pastaInterna = "cadastro_login/"; #se tive no diretorio raiz , deixe vazio
define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}");
(substr($_SERVER['DOCUMENT_ROOT'], -1) == '/') ? $barra = '' : $barra = '/';
define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$barra}{$pastaInterna}");

#Atalhos
define('DIRIMG', DIRPAGE . 'img/');
define('DIRCSS', DIRPAGE . 'lib/css/');
define('DIRJS', DIRPAGE . 'lib/js/');

#Acesso ao DB
define('HOST', "localhost");
define('DB', "sistema");
define('USER', "root");
define('PASS', "");

#Informações do servidor de email
define("HOSTMAIL","smtp.gmail.com");
define("USERMAIL","fabricio.colodette2001@gmail.com");
define("PASSMAIL","Fabricio123");

#Outras informações
define('SITEKEY', '6Le5fW4aAAAAAC3ZN0k1POpSTFfA7bwyGQoV-SfI');
define('SECRETKEY', '6Le5fW4aAAAAAG47LS1Fuul2fWxW7vHagEadyX71');
define('DOMAIN', $_SERVER["HTTP_HOST"]);
