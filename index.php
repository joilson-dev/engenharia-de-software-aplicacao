<?php

use Classes\ClassDispatch;

header("Content-Type: text/html; charset=utf-8");
include("config/config.php");
include(DIRREQ . "lib/vendor/autoload.php");
include(DIRREQ . "helpers/variables.php");

$diespatch = new Classes\ClassDispatch();
include($diespatch->getInclusão());

/*
mysqli_connect("us-cdbr-east-04.cleardb.com", "b5da11fde38f6a", "44b2e8bf", "heroku_3762ce4dc37b2bb") or die(mysqli_error());
echo "Connected to MySQL<br />";
*/
/*
echo "Teste Utilizando as variaveis de config <br>";
include("config/config.php");
try {
  echo HOST;
  echo DB;
  echo USER; 
  echo PASS;
} catch (Exception $e) {
  echo "Erro";
}
try {
  $con = new PDO("mysql:host=" . HOST . ";dbname=" . DB . "", "" . USER . "", "" . PASS . "");
  echo "Conectou no Banco de dados";
} catch (PDOException $erro) {
  echo "Deu algum problema";
  echo $erro;
}
*/
