<?php
#Caminho absolutos
$pastaInterna = ""; #se tive no diretorio raiz , deixe vazio
define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}");
(substr($_SERVER['DOCUMENT_ROOT'], -1) == '/') ? $barra = '' : $barra = '/';
define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$barra}{$pastaInterna}");

#Atalhos
define('DIRIMG', DIRPAGE . 'img/');
define('DIRCSS', DIRPAGE . 'lib/css/');
define('DIRJS', DIRPAGE . 'lib/js/');

#Acesso ao DB
define('HOST', "us-cdbr-east-04.cleardb.com/heroku_3762ce4dc37b2bb?reconnect=true");
define('DB', "heroku_3762ce4dc37b2bb");
define('USER', "b5da11fde38f6a");
define('PASS', "44b2e8bf");

#Informações do servidor de email
define("HOSTMAIL","smtp.gmail.com");
define("USERMAIL","seuEmail@email.com");
define("PASSMAIL","suaSenha");

#Outras informações
define('SITEKEY', '6LeVd30bAAAAAIofJQ4qqP9RREeEih9lx1bVkCst');
define('SECRETKEY', '6LeVd30bAAAAAOoMi5wEflEETJC7NxRIazqWIf45');
define('DOMAIN', $_SERVER["HTTP_HOST"]);
