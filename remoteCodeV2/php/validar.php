<?php  
	header('Content-Type: text/html; charset=UTF-8');
	session_start();
	if (!isset($_SESSION["login"])) {
		header("location: paginareservada.html");
	}
?>
