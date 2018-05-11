<?php
	if (isset($_POST['submit']))
	{
		header('Content-Type: text/html; charset=UTF-8');
		include("DB.php");
		$password=$_POST["pass"];
		$user=$_POST["user"];
		$login = mysqli_query($link, "SELECT * FROM Users where login='$user' AND pass='$password'");

		$direitos = mysqli_query($link, "SELECT direitos FROM Users where login='$user' AND pass='$password'");

		if (strlen($password) < 1 || strlen($user) < 1)
		{
			echo '<p align="center" style="display:inline; margin-left: 30px"><font size="5" color="red">Todos os campos devem ser preenchidos</font></p>';
		}
		elseif (mysqli_num_rows($login)>0 )
		 {
			$registos=mysqli_fetch_array($login); //coloca o registo na variável
			session_start();
			$login = utf8_encode($registos["login"]);

			$registos2=mysqli_fetch_array($direitos); //coloca os direitos do user na variável
			$direitos2 = utf8_encode($registos2["direitos"]);
			
			$_SESSION["login"]=$login; //Cria a sessão com o conteúdo da coluna nome
			
			if ($direitos2 == "Admin") 
			{
				header("location: homeAdmin.php");
			} else 
			{
				header("location: home.php");
			}
			
		}
		else 
		{
			echo('<p align="center" style="display:inline; margin-left: 30px"><font size="5" color="red">Username ou Password não encontrados</font></p>');
		}
	}
?>