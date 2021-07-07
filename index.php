<?php

use Classes\ClassDispatch;

header("Content-Type: text/html; charset=utf-8");
include("config/config.php");
include(DIRREQ . "lib/vendor/autoload.php");
include(DIRREQ . "helpers/variables.php");

$diespatch = new Classes\ClassDispatch();
include($diespatch->getInclusão());

