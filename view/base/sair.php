<?php 
include "header.php";
Util::verificarLogin();
Session_destroy();
header("Location: http://" . $_SERVER['HTTP_HOST'] ."/view/login.php");
?>