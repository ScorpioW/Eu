<?php  
	header('Content-Type: text/html; charset=UTF-8');
	session_start();
	$pr = $_SESSION['sess_type'];
    if (!isset($_SESSION['user']['login'])) 
    {
        header('location: http://192.168.209.8/Estagio/Contactos/');
		
    } elseif ($pr == 1) 
    {
        include("header.php");
    } else 
    {
        if (!$pr == 2) 
        {
            header('location: paginareservada');
        }
        include("headerUtil.php");
    }
?>