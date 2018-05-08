<?php  
header('Content-Type: text/html; charset=UTF-8');
session_start();
if (!isset($_SESSION["Username"])) {
	echo "Pagina reservada a utilizar";
	exit;
}



?>