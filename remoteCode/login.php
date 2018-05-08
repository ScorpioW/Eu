<?php
include("php/header.php");
header('Content-Type: text/html; charset=UTF-8');
include("DB.php");
$password=$_POST["pass"];
$user=$_POST["user"];
$login= mysqli_query($link, "SELECT * FROM Users where login='$user' AND pass='$password'");
	if (strlen($password)< 1)
	{
		echo '<p align="center">Não digitou a password<br>;
		<a href="javascript:history.back(1);">tente de novo</a></p>';
	}
	elseif (mysqli_num_rows($login)>0 )
	 {
		$registos=mysqli_fetch_array($login); //coloca o registo na variável
		session_start();
		$nome = utf8_encode($registos["login"]);
		
		$_SESSION["nome"]=$nome; //Cria a sessão com o conteúdo da coluna nome
		header("location: index.html");
	}
	else 
	{
		header("location: no-sidebar.php");
	}
	include("php/footer.php");
?>