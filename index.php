<?php
/*
use Classes\ClassDispatch;

header("Content-Type: text/html; charset=utf-8");
include("config/config.php");
include(DIRREQ . "lib/vendor/autoload.php");
include(DIRREQ . "helpers/variables.php");

$diespatch = new Classes\ClassDispatch();
include($diespatch->getInclusão());
*/

mysqli_connect("us-cdbr-east-04.cleardb.com", "b5da11fde38f6a", "44b2e8bf", "heroku_3762ce4dc37b2bb") or die(mysqli_error());
echo "Connected to MySQL<br />";
