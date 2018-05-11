<?php  
	header('Content-Type: text/html; charset=UTF-8');
	session_start();
	$pr = $_SESSION['sess_type'];
	if (!isset($_SESSION['login'])) {
		header('location: paginareservada.html');
		
    } else 
    {
        if (!$pr == 2) {
            header('location: paginareservada.html');
        }
    }
?>