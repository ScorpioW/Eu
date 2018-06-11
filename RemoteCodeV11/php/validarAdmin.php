<?php  
	header('Content-Type: text/html; charset=UTF-8');
    session_start();
    $pr = $_SESSION['sess_type'] == 1;
    if (!isset($_SESSION['user']['login'])) 
    {
		header('location: paginareservada.php');
		
    } else 
    {
        include("header.php");
        if (!$pr == 1) 
        {
            header('location: home.php');
        }
    }
?>