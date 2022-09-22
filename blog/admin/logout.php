<?php
//include config PHP file 
require_once('../include/confg.php');

//log user out
$user->logout();
header('Location: index.php'); 

?> 