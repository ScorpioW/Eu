<?php  
	header('Content-Type: text/html; charset=UTF-8');
	session_start();
	$pr = $_SESSION['sess_type'];
	if (!isset($_SESSION['login'])) {
        header('location: paginareservada.php');
		
    } elseif ($pr == 1) 
    {
        include("header.php");
    } 
    else 
    {
        include("headerUtil.php");
        if (!$pr == 2) {
            header('location: paginareservada.php');
        }
    }
?>