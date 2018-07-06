<?php  
	header('Content-Type: text/html; charset=UTF-8');
    session_start();
    if (!isset($_SESSION['user'])) 
    {
		header('location: paginareservada');
    } else 
    {
        if ($_SESSION['user']['sess_type'] == 1)
        {
            include("header.php");
        }
        else 
        {
            header('location: home');
        }
    }
?>